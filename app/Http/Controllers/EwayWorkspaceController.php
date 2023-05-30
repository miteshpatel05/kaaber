<?php

namespace App\Http\Controllers;
use App\Library\EwbHelper;
use Illuminate\Http\Request;

use Carbon\Carbon;
use DataTables;
use App\Models\ewaybill;
use App\Models\ewbextvalidity;
use App\Models\tracking;
use App\Models\vehicle;
use App\Models\VehicleEwaybillMaster;
use App\Models\vewbgroup;
use GuzzleHttp\Psr7\Query;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class EwayWorkspaceController extends Controller
{
    public $ewb;

    public function __construct()
    {
        $this->middleware('auth');

        $this->ewb = new EwbHelper();
    }

    public function index(){
        return view('BackEnd.workspace');
    }

    public function getGroupList(Request $request){

        if($request->ajax()){


            $start_date="";
            $end_date = "";
            if($request->input('start_date') && $request->input('end_date'))
            {
                $start_date = Carbon::parse($request->input('start_date'));
                $end_date = Carbon::parse($request->input('end_date'))->addDay();
            }
            $vehicleNo = $request->input('vehicleNo');
            $ewbNo = $request->input('ewbNo');
            $fromPlace = $request->input('fromPlace');
            $toPlace = $request->input('toPlace');

            $vgdata = vehicle::where('user_id',Auth::id())->orderBy('id')->get();

            return response()->json([
                'vem' => $vgdata
            ]);

        }
        else{
            abort(403);
        }
    }

    public function VehicleDetailView($id){

        $vehicle = vehicle::where('id',$id)->first();


        $user = config('roles.models.defaultUser')::find(Auth::id());

        if ($user->allowed('edit.article', $vehicle)) { // $user->allowedEditArticles($article)
            $tracking = tracking::where('vid',$id)->orderby('id','desc')->first();
            return view('BackEnd.vehicledetail',compact(['vehicle','tracking']));
        }
        else{
            return view('pages-404');
        }

    }
    public function getVehicleDetailList(Request $request){

        if($request->ajax()){


            $start_date="";
            $end_date = "";
            if($request->input('start_date') && $request->input('end_date'))
            {
                $start_date = Carbon::parse($request->input('start_date'));
                $end_date = Carbon::parse($request->input('end_date'))->addDay();
            }

            $ewbNo = $request->input('ewbNo');
            $fromPlace = $request->input('fromPlace');
            $toPlace = $request->input('toPlace');
            $vehicleid = $request->input('vehicleid');

            $vgdata = VehicleEwaybillMaster::query()

            ->when($start_date,function($query) use($start_date, $end_date){
                $query->with(['vehicles','ewaybills'])->whereIn('eid',function($query)use($start_date, $end_date){
                    $query->select('id')->from(with(new Ewaybill)->getTable())
                    ->whereBetween('ewayBillDate', [$start_date, $end_date])
                    ;});
            })
            ->when($ewbNo,function($query) use($ewbNo){
                $query->with(['vehicles','ewaybills'])->whereIn('eid',function($query)use($ewbNo){
                    $query->select('id')->from(with(new Ewaybill)->getTable())
                    ->where('ewbNo','LIKE','%'.$ewbNo.'%')
                    ;});
            })

            ->when($fromPlace,function($query) use($fromPlace){
                $query->with(['vehicles','ewaybills'])->whereIn('eid',function($query)use($fromPlace){
                    $query->select('id')->from(with(new Ewaybill)->getTable())
                    ->where('fromPlace','LIKE','%'.$fromPlace.'%')
                    ;});
            })
            ->when($toPlace,function($query) use($toPlace){
                $query->with(['vehicles','ewaybills'])->whereIn('eid',function($query)use($toPlace){
                    $query->select('id')->from(with(new Ewaybill)->getTable())
                    ->where('toPlace','LIKE','%'.$toPlace.'%')
                    ;});
            })
            ->when(true, function($query){
                $query->with(['vehicles','ewaybills'])->latest();
            })
            ->whereIn('vid',function($query)use($toPlace){
                $query->select('id')->from(with(new vehicle)->getTable());
            })
            ->where('user_id',Auth::id())
            ->where('vid',$vehicleid)
            ->orderBy('eid')->get();

            return response()->json([
                'vem' => $vgdata
            ]);

        }
        else{
            abort(403);
        }
    }

    public function UpdateLR(Request $request){

        $html="";
        if($request->id){
            $id = $request->id;
            $vem = VehicleEwaybillMaster::with(['ewaybills'])->where('id',$id)->first();
            // echo "<pre>";
            // print_r($vem);
            // echo "<br>";
            $vehicleno =  $vem->vehicles->vehicleno;
            $ewaybill = $vem->ewaybills->ewbNo;
            $ewaybilldate = $vem->ewaybills->ewayBillDate;
            $fromplace = $vem->ewaybills->fromPlace;
            $fromtoplace = $vem->ewaybills->toPlace;
            $lrno = $vem->lrno;
            $lrdate = $vem->lrdate;

            $html .= "<tr>
            <td>$vehicleno</td>
            <td>$ewaybill</td>
            <td>$ewaybilldate</td>
            <td>$fromplace</td>
            <td>$fromtoplace</td>
            <td><input type='hidden' name='id' value='$id'>
            <input type='text' name='lrno' required value='$lrno'></td>
            <td><input type='date' name='lrdate' required value='$lrdate'></td>
            </tr>";


            // echo $html;
            $message = "Success";
            $mobileno = $vem->vehicles->mobile;
            return response()->json(['html' => $html, 'message' => $message,'mobileno' => $mobileno], 200);
        }
        else{
            $html = "";
            $message = "Fail";
            return response()->json(['html' => $html, 'message' => $message], 200);
        }
    }

    public function SaveLR(Request $request){
        $request->validate([
            'drivermobileno' => 'required|numeric',
            'lrno' => 'required|numeric',
            'lrdate' => 'required|date',
        ]);

        $id = $request->id;

        $vehicle = vehicle::where('id',function($query)use($id){
            $query->select('vid')->from(with(new VehicleEwaybillMaster())->getTable())
            ->where('id',$id);
        })->first();

        $vehicle->mobile = $request->drivermobileno;
        $vehicle->save();

        // $vid = VehicleEwaybillMaster::select('vid')->where('id',$id)->first();
        // $vem = VehicleEwaybillMaster::where('vid',$vid->vid)->update(['user_id' => Auth::id()]);

        $vem = VehicleEwaybillMaster::where('id',$id)->first();
        $vem->lrno = $request->lrno;
        $vem->lrdate = $request->lrdate;
        $vem->save();

        return response()->json(["mobileno"=>$request->drivermobileno],200);
    }

    public function SaveTracking(Request $request){
        $request->validate([
            'pincode' => 'required|numeric',
            'location' => 'required|string',
            'trackingdate' => 'required|date',
            'remark' => 'string',
        ]);


        $vid= $request->vid;
        if($request->tid<>""){
            $tracking = tracking::where('id',$request->tid)->first();
        }
        else{
            $tracking = new tracking;
        }

        $tracking->vid = $request->vid;
        $tracking->pincode = $request->pincode;
        $tracking->location = $request->location;
        $tracking->status = $request->vehicleStatus;
        $tracking->trackingdate = $request->trackingdate;
        $tracking->remark = $request->remark;
        $tracking->save();

        return response()->json(['vid' => $vid], 200);

    }

    public function getTrackingHistory(Request $request){

        $html="";
        $latest = true;
        if($request->vid){
            $vid = $request->vid;
            $tracking = tracking::where('vid',$vid)->orderby('id','desc')->get();
            $i = tracking::where('vid',$vid)->orderby('id','desc')->count();
            if($i==0){
                $html .="No record found!";
            }
            foreach($tracking as $track){

                $html .= "<tr>
                <td><label id='srno'>$i</label>
                <label hidden id='edit_tid'>$track->id</label></td>
                <td><label id='edit_pincode'>$track->pincode</label></td>
                <td><label id='edit_location'>$track->location </label></td>
                <td><label id='edit_trackingdate'>$track->trackingdate</label></td>
                <td><label id='edit_status'>$track->status </label></td>
                <td><label id='edit_remark'>$track->remark </label></td>";
                $i--;
                if($latest){
                    $html .= "<td>
                    <button type='button' id='btnEdit' onclick='EditTracking()' class='btn btn-sm btn-success'>Edit</button>
                    <button type='button' id='btnDelete' onclick='DeleteTracking(".$track->id.")' class='btn btn-sm btn-danger' onclick='deletetracking()'>Delete</button>
                    </td>";

                    $latest = false;
                }
                $html .= "</tr>";
            }

            // echo $html;
            $message = "Success";
            return response()->json(['html' => $html, 'message' => $message], 200);
        }
        else{
            $html = "";
            $message = "Fail";
            return response()->json(['html' => $html, 'message' => $message], 200);
        }
    }

    public function DeleteTracking(Request $request){
        $vid = tracking::select('vid')->where('id',$request->tid)->first();
        $tracking = tracking::where('id',$request->tid)->first();
        $tracking->delete();
        return response()->json(['vid' => $vid], 200);
    }

    public function UngroupVehicle(Request $request){
        $vid = $request->vid;
        $tracking = tracking::where('vid',$vid)->count();
        $message="";
        if($tracking){
            $message = "Tracking process start so, you can't ungroup this vehicle!";
        }
        else{
            $vem = VehicleEwaybillMaster::where('vid',$vid)->update(['user_id' => null,'lrno'=>null,'lrdate'=>null]);
            $vehicle = vehicle::where('id',$vid)->update(['user_id' => null,'mobile'=>null,'groupdate'=>null]);
        }

        return response()->json(['message' => $message], 200);
    }

    public function ExtendEWB(Request $request){
        $eid = $request->eid;
        $message=null;
        // $tracking = tracking::where('vid',$eid)->count();
        try {


            $ewaybill = ewaybill::where('id',$eid)->first();
            $vehicle = vehicle::where('id',function($query)use($eid){
                $query->select('vid')->from(with(new VehicleEwaybillMaster())->getTable())
                ->where('eid',$eid);
                })->first();

            $url = 'https://maps.googleapis.com/maps/api/distancematrix/json?';
            $api = 'AIzaSyCNFeNmvBIkNtLwFXeNjw1EEK4ZeUr-tBI';
            $frmPincode = "382345";
            $toPincode = "384170";
            $param = array(
                'origins' => $frmPincode,
                'destinations' => $toPincode,
                'key' => $api
            );

            $newurl = $url.http_build_query($param);
            // echo $newurl;

            $response = Http::withoutVerifying()->withOptions(['verify'=>false])->get($newurl);
            // $data = $response->collect();
            $data = json_decode($response->collect());
            $distance = $data->rows[0]->elements[0]->distance->text;

            // echo $distance;

            $distance = str_replace(" km","",$distance);

            // store data to extend table

            $extendvalidity = new ewbextvalidity;

            $extendvalidity->ewbNo = $ewaybill->ewbNo;
            $extendvalidity->addressLine1 = $ewaybill->fromAddr1;
            $extendvalidity->addressLine2 = $ewaybill->fromAddr2;
            $extendvalidity->fromPincode = $ewaybill->fromPincode;
            $extendvalidity->fromPlace = $ewaybill->fromPlace;
            $extendvalidity->fromStateName = $vehicle->fromState;
            $extendvalidity->fromStateCode = $ewaybill->fromStateCode;
            $extendvalidity->vehicle_id = $vehicle->id;
            $extendvalidity->transDocDate = $vehicle->transDocDate;
            $extendvalidity->transDocNo = $vehicle->transDocNo;
            $extendvalidity->transMode = $vehicle->transMode;
            $extendvalidity->vehicleNo = $vehicle->vehicleno;
            $extendvalidity->remainingDistance = $distance;
            $extendvalidity->created_by = Auth::id();
            $extendvalidity->updated_by = Auth::id();
            $extendvalidity->extnRsnCode = 1;
            $extendvalidity->consignmentStatus =  'T';
            $extendvalidity->transitType =  'R';
            $extendvalidity->extnRemarks = null;
            $extendvalidity->addressLine3 = null;
            $extendvalidity->updStatus = null;
            $extendvalidity->updMsg = null;

            $extendvalidity->save();

          } catch (\Exception $e) {

              $message = "Opps some thing wrong, plz contact admin.";
            //   $message = $e->getMessage();
        }

        return response()->json(['message'=> $message],200);
    }
}
