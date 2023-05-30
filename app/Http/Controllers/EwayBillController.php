<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Library\EwbHelper;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Http;
use App\Models\setting;
use App\Models\ewaybill;
use App\Models\vehicle;
use App\Models\VehicleEwaybillMaster;
use App\Models\vewbgroup;
use SebastianBergmann\Type\TrueType;
use Illuminate\Support\Facades\Auth;

class EwayBillController extends Controller
{
    public $ewb;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->ewb = new EwbHelper();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return view('BackEnd.ewaybilllist');

    }

    public function getList(){
        $vem = VehicleEwaybillMaster::with(['ewaybills'])->get();

        $list = $this->ewbgroups->get_datatables();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $ewb) {

        	$deleteBtn = form_checkbox(array('name' => 'addgroup[]', 'value' => $ewb->id, 'checked' => false));

        	$row   = array();
            $row[] = $ewb->id;
            $row[] = $deleteBtn;
            $row[] = $ewb->child_transDocNo;
            $row[] = $ewb->child_transDocDate;
            $row[] = $ewb->child_vehicleNo;
            $row[] = $ewb->ewbNo;
            $row[] = $ewb->ewayBillDate;
            $row[] = $ewb->fromPlace;
            $row[] = $ewb->toPlace;
            $row[] = $ewb->fromTrdName;
            $row[] = $ewb->toTrdName;
            $row[] = $ewb->ewbVehicleType;
            $row[] = $ewb->driverNo;
            $row[] = $ewb->partyNo;
            $row[] = $ewb->ownerNo;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->ewbgroups->count_all(),
            "recordsFiltered" => $this->ewbgroups->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    /*
    AJAX request
    */
    public function getLists(Request $request){

        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = VehicleEwaybillMaster::select('count(*) as allcount')->count();
        $totalRecordswithFilter = VehicleEwaybillMaster::select('count(*) as allcount')->where('vehicleno', 'like', '%' .$searchValue . '%')->count();

        // Fetch records
        $records = VehicleEwaybillMaster::orderBy($columnName,$columnSortOrder)
            ->where('vehicleewaybillmaster.vehicleno', 'like', '%' .$searchValue . '%')
            ->select('vehicleewaybillmaster.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        foreach($records as $record){
            $id = $record->id;
            $vehicleno = $record->vehicleno;
            $ewbNo = $record->ewbNo;
            $ewayBillDate = $record->ewayBillDate;
            $fromPlace = $record->fromPlace;
            $toPlace = $record->toPlace;

            $data_arr[] = array(
                "id" => $id,
                "vehicleno" => $vehicleno,
                "ewbNo" => $ewbNo,
                "ewayBillDate" => $ewayBillDate,
                "fromPlace" => $fromPlace,
                "toPlace" => $toPlace
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );
        echo "<pre>";
        print_r($response);exit;
        echo json_encode($response);
        exit;
    }

    // public function getEwayBillList(Request $request){

    //         if($request->ajax()){
    //             $start_date="";
    //             $end_date = "";
    //             if($request->input('start_date') && $request->input('end_date'))
    //             {
    //                 $start_date = Carbon::parse($request->input('start_date'));
    //                 $end_date = Carbon::parse($request->input('end_date'))->addDay();
    //             }
    //             $vehicleNo = $request->input('vehicleNo');
    //             $ewbNo = $request->input('ewbNo');
    //             $fromPlace = $request->input('fromPlace');
    //             $toPlace = $request->input('toPlace');

    //             $vem = VehicleEwaybillMaster::query()

    //             ->when($start_date,function($query) use($start_date, $end_date){
    //                 $query->with('ewaybills')->whereIn('eid',function($query)use($start_date, $end_date){
    //                     $query->select('id')->from(with(new Ewaybill)->getTable())
    //                     ->whereBetween('ewayBillDate', [$start_date, $end_date])
    //                     ;});
    //             })
    //             ->when($ewbNo,function($query) use($ewbNo){
    //                 $query->with('ewaybills')->whereIn('eid',function($query)use($ewbNo){
    //                     $query->select('id')->from(with(new Ewaybill)->getTable())
    //                     ->where('ewbNo','LIKE','%'.$ewbNo.'%')
    //                     ;});
    //             })
    //             ->when($vehicleNo, function($query)use($vehicleNo){
    //                 $query->with('ewaybills')->where('vehicleno','LIKE','%'.$vehicleNo.'%');
    //             })
    //             ->when($fromPlace,function($query) use($fromPlace){
    //                 $query->with('ewaybills')->whereIn('eid',function($query)use($fromPlace){
    //                     $query->select('id')->from(with(new Ewaybill)->getTable())
    //                     ->where('fromPlace','LIKE','%'.$fromPlace.'%')
    //                     ;});
    //             })
    //             ->when($toPlace,function($query) use($toPlace){
    //                 $query->with('ewaybills')->whereIn('eid',function($query)use($toPlace){
    //                     $query->select('id')->from(with(new Ewaybill)->getTable())
    //                     ->where('toPlace','LIKE','%'.$toPlace.'%')
    //                     ;});
    //             })
    //             ->when(true, function($query){
    //                 $query->with('ewaybills')->latest();
    //             })
    //             ->get();

    //             return response()->json([
    //                 'vem' => $vem
    //             ]);

    //         }
    //         else{
    //             abort(403);
    //         }
    // }

    public function getEwayBillList(Request $request){

        // $data = $request->all;
        // $data = explode($data,",");
        // print_r( $data);exit;

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

            $vem = VehicleEwaybillMaster::query()

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
            ->when($vehicleNo, function($query)use($vehicleNo){
                $query->with(['vehicles','ewaybills'])->whereIn('vid',function($query)use($vehicleNo){
                    $query->select('id')->from(with(new vehicle)->getTable())
                    ->where('vehicleno','LIKE','%'.$vehicleNo.'%')
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
            ->where('user_id',null)
            ->orderBy('vid')->get();

            return response()->json([
                'vem' => $vem
            ]);

        }
        else{
            abort(403);
        }
    }

    public function getEwayBillDateFilter(Request $request){

        // $s = Carbon::parse($request->start_date)->format('Y-m-d');
        $e = $request->end_date;
        $s = $request->post();
        print_r($s);
        exit;
            return response()->json(['html' => $e], 200);


        // $data = VehicleEwaybillMaster::with('ewaybills')->whereIn('eid',function($query)use($s,$e){
        //     $query->select('id')->from(with(new Ewaybill)->getTable())
        //     ->whereDate('ewayBillDate','>=', '2023-04-01')
        //     ->whereDate('ewayBillDate','<=' ,'2023-04-20')
        //     ;})->get();

        // // $data = VehicleEwaybillMaster::with(array('ewaybills' => function ($query)use($request) {
        // //             $query->whereBetween('ewayBillDate', [$request->start_date, $request->end_date]);
        // // }))->get();

        // echo "<pre>";
        // echo $s."<br>".$e;
        // print_r($data);

        // $data = VehicleEwaybillMaster::with('ewaybills')->whereIn('eid',function($query){
        //     $query->select('id')->from(with(new Ewaybill)->getTable())
        //     ->where('ewbNo', '=','551008882487')
        //     ;})->get();

        // echo "<pre>";
        // print_r($data);

        if($request->ajax()){
            $data = VehicleEwaybillMaster::with('ewaybills')->whereIn('eid',function($query)use($s,$e){
                $query->select('id')->from(with(new Ewaybill)->getTable())
                ->whereDate('ewayBillDate','>=', $s)
                ->whereDate('ewayBillDate','<=' ,$e)
                ;})->get();

            // $data = VehicleEwaybillMaster::with(array('ewaybills' => function ($query)use($request) {
            //     $query->where('ewbNo', '551008882487');
            //     }))->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action',function($data){

                    //*** to add button like edit and delete */
                    $actionBtn= "<input type='checkbox' id='vemid' name='vemid[]' value='$data->id'>";
                    return $actionBtn;

                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function AddtoGroup(Request $request)
    {
        $html="";
        if($request->vemid){
                foreach($request->vemid as $id){
                    $vem = VehicleEwaybillMaster::with(['ewaybills'])->where('id',$id)->first();
                    // echo "<pre>";
                    // print_r($vem);
                    // echo "<br>";
                    $vehicleno =  $vem->vehicles->vehicleno;
                    $ewaybill = $vem->ewaybills->ewbNo;
                    $ewaybilldate = $vem->ewaybills->ewayBillDate;
                    $fromplace = $vem->ewaybills->fromPlace;
                    $fromtoplace = $vem->ewaybills->toPlace;

                    $html .= "<tr>
                    <td>$vehicleno</td>
                    <td>$ewaybill</td>
                    <td>$ewaybilldate</td>
                    <td>$fromplace</td>
                    <td>$fromtoplace</td>
                    <td><input type='hidden' name='id[]' value='$id'>
                    <input type='text' name='lrno[]' required></td>
                    <td><input type='date' name='lrdate[]' required></td>
                    </tr>";
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

    public function SaveGroup(Request $request){

        for($i=0;$i<count($request->input('id'));$i++){

            $id = $request->id[$i];

            $vehicle = vehicle::where('id',function($query)use($id){
                $query->select('vid')->from(with(new VehicleEwaybillMaster())->getTable())
                ->where('id',$id);
            })->first();

            $vehicle->mobile = $request->drivermobileno;
            $vehicle->user_id = Auth::id();
            $vehicle->groupdate = Carbon::now();
            $vehicle->save();

            // $vid = VehicleEwaybillMaster::select('vid')->where('id',$id)->first();
            // $vem = VehicleEwaybillMaster::where('vid',$vid->vid)->update(['user_id' => Auth::id()]);

            $vem = VehicleEwaybillMaster::where('id',$id)->first();
            $vem->user_id = Auth::id();
            $vem->lrno = $request->lrno[$i];
            $vem->lrdate = $request->lrdate[$i];
            $vem->save();

        }
    }

    /**
     * Get Single Ewaybill Using API.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getSingleEwb()
    {

        $ewbs = $this->ewb->getEwbByDate(date('15/m/Y'));

        foreach ($ewbs as $key => $value) {
            $this->ewb->getEwb($value->ewbNo);
        }
        echo 'successfully data downloaded...';


        // echo '<pre>';
        // print_r(unserialize($ewbNo['result']->VehiclListDetails));
        // exit;
    }

    /**
     * Get All Statewise Ewaybills Using API.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     * GetEwayBillsForTransporterByState
     */
    public function getStatewiseEwb()
    {
        return 'welcome to group';
    }

    /**
     * Show the Ewaybill Group Page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function group()
    {
        return 'welcome to group';
    }

    /**
     * Show the Ewaybill Tracking Page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function tracking()
    {
        return 'welcome to tracking';
    }
}
