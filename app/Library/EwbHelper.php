<?php
namespace App\Library;

use App\Models\Ewaybill;
use App\Models\Ewbmasters;
use App\Models\Setting;
use App\Models\vehicle;
use App\Models\VehicleEwaybillMaster;
use Illuminate\Support\Facades\Http;

class EwbHelper{

    public $crd = [];
    public $api = [];
    public $source;
    public $token;

    public function __construct()
    {
        $this->source=Setting::where('name','eway_default_source')->first()->value;
        if($this->source == 'LIVE'){
            $this->crd = Setting::where('name','like','eway_%')->where('name','not like','eway_test%')->get();

        }
        else
        {
            $this->crd = Setting::where('name','like','eway_test%')->get();
            foreach($this->crd as $value){
                $value->name = str_replace('_test', '', $value->name);
                $this->api[$value->name] = $value->value;
            }
            $this->crd = (object) $this->api;
        }

        $this->token = Session('authToken');
        if(! $this->token){
            $this->token = $this->generateToken();
            Session()->put('authToken', $this->token);
        }


    }

    public function generateToken(){

        $params['action'] = 'ACCESSTOKEN';
        $params['aspid'] =  $this->crd->eway_asp_id;
        $params['password'] =  $this->crd->eway_password;
        $params['gstin'] =  $this->crd->eway_gstin;
        $params['username'] =  $this->crd->eway_username;
        $params['ewbpwd'] =  $this->crd->eway_ewbpwd;

        $url =  $this->crd->eway_auth_url.http_build_query($params);

        $response = Http::get($url);
        $data = json_decode($response->body());

        // if($data->status)
        //     return $data->authtoken;
        // else
        //     return false;
    }

    public function getEwbByDate($date) {

        $params['action'] = 'GetEwayBillsByDate';
        $params['aspid'] =  $this->crd->eway_asp_id;
        $params['password'] =  $this->crd->eway_password;
        $params['gstin'] =  $this->crd->eway_gstin;
        $params['username'] =  $this->crd->eway_username;
        $params['ewbpwd'] =  $this->crd->eway_ewbpwd;
        $params['authtoken'] = $this->token;
        $params['date'] = $date;

        $url =  $this->crd->eway_ewaybill_url.http_build_query($params);

        $response = Http::get($url);
        $data = json_decode($response->body());
        return $data;
	}



    public function getEwb($ewbNo = null) {

        $params['action'] = 'GetEwayBill';
        $params['aspid'] =  $this->crd->eway_asp_id;
        $params['password'] =  $this->crd->eway_password;
        $params['gstin'] =  $this->crd->eway_gstin;
        $params['username'] =  $this->crd->eway_username;
        $params['ewbpwd'] =  $this->crd->eway_ewbpwd;
        $params['authtoken'] = $this->token;
        $params['ewbNo'] = $ewbNo;

        $url =  $this->crd->eway_ewaybill_url.http_build_query($params);

        $response = Http::get($url);
        $value = json_decode($response->body());

        // echo "<pre>";
        // print_r($value);


        $ewayBillDate = str_replace("/", "-", $value->ewayBillDate);
        $docDate = str_replace("/", "-", $value->docDate);
        $validUpto = str_replace("/", "-", $value->validUpto);

        $value->itemList = serialize($value->itemList);
        $value->VehiclListDetails = serialize($value->VehiclListDetails);

        $value->ewayBillDate = date('Y-m-d H:i:s', strtotime($ewayBillDate));
        $value->docDate = date('Y-m-d', strtotime($docDate));
        $value->validUpto = date('Y-m-d H:i:s', strtotime($validUpto));

        $value->transitDays = 0;
        $value->remainDist = 0;
        $value->remainDays = 0;

        $ewaybill = Ewaybill::where('ewbNo',$value->ewbNo)->first();

        if(Ewaybill::where('ewbNo',$value->ewbNo)->count() < 1){
            $ewaybill = new Ewaybill;
            foreach ($value as $k => $v)
                $ewaybill->$k = $v;

            if($ewaybill->save()) {


                //save vehicle details
                $ewbVehicles = unserialize($value->VehiclListDetails);
                foreach ($ewbVehicles as $k => $v) {

                    $eDate = str_replace("/", "-", $v->enteredDate);
                    $enteredDate = date('Y-m-d', strtotime($eDate));
                    $tDocDate = str_replace("/", "-", $v->transDocDate);
                    $transDocDate = date('Y-m-d H:i:s', strtotime($tDocDate));

                    if(vehicle::where('vehicleno',$v->vehicleNo)
                    ->where('enteredDate',$enteredDate)->count() < 1){
                        $veh = new vehicle();
                        $veh->vehicleno = $v->vehicleNo;
                        $veh->updMode = $v->updMode;
                        $veh->fromPlace = $v->fromPlace;
                        $veh->fromState = $v->fromState;
                        $veh->tripshtNo = $v->tripshtNo;
                        $veh->userGSTINTransin = $v->userGSTINTransin;
                        $veh->enteredDate = $enteredDate;
                        $veh->transMode = $v->transMode;
                        $veh->transDocNo = $v->transDocNo;
                        $veh->transDocDate = $transDocDate;
                        $veh->groupNo = $v->groupNo;

                        $veh->save();
                        $vem = new VehicleEwaybillMaster();
                        $vem->vid = $veh->id;
                        $vem->eid = $ewaybill->id;
                        $vem->save();

                    }
                    else{
                        $vehicle = vehicle::where('vehicleno',$v->vehicleNo)
                                        ->where('enteredDate',$enteredDate)->first();
                        $vem = new VehicleEwaybillMaster();
                        $vem->vid = $vehicle->id;
                        $vem->eid = $ewaybill->id;
                        $vem->save();
                    }

                }

                // $ewbVehicles = unserialize($value->VehiclListDetails);
                // if(isset($ewbVehicles[0]) AND ! empty(isset($ewbVehicles[0]))) {
                //     foreach ($ewbVehicles as $k => $v) {

                //         $ewbmaster = new Ewbmasters();
                //         $eDate = str_replace("/", "-", $v->enteredDate);
                //         $enteredDate = date('Y-m-d H:i:s', strtotime($eDate));

                //         $tDocDate = str_replace("/", "-", $v->transDocDate);
                //         $transDocDate = date('Y-m-d H:i:s', strtotime($tDocDate));

                //         $ewbmaster->ewbId = $ewaybill->id;
                //         $ewbmaster->ewbNo = $value->ewbNo;
                //         $ewbmaster->ewayBillDate = $value->ewayBillDate;
                //         $ewbmaster->genMode = $value->genMode;
                //         $ewbmaster->userGstin = $value->userGstin;
                //         $ewbmaster->supplyType = $value->supplyType;
                //         $ewbmaster->subSupplyType = $value->subSupplyType;
                //         $ewbmaster->docType = $value->docType;
                //         $ewbmaster->docNo = $value->docNo;
                //         $ewbmaster->docDate = $value->docDate;
                //         $ewbmaster->fromGstin = $value->fromGstin;
                //         $ewbmaster->fromTrdName = $value->fromTrdName;
                //         $ewbmaster->fromAddr1 = $value->fromAddr1;
                //         $ewbmaster->fromAddr2 = $value->fromAddr2;
                //         $ewbmaster->fromPlace = $value->fromPlace;
                //         $ewbmaster->fromPincode = $value->fromPincode;
                //         $ewbmaster->fromStateCode = $value->fromStateCode;
                //         $ewbmaster->toGstin = $value->toGstin;
                //         $ewbmaster->toTrdName = $value->toTrdName;
                //         $ewbmaster->toAddr1 = $value->toAddr1;
                //         $ewbmaster->toAddr2 = $value->toAddr2;
                //         $ewbmaster->toPlace = $value->toPlace;
                //         $ewbmaster->toPincode = $value->toPincode;
                //         $ewbmaster->toStateCode = $value->toStateCode;
                //         $ewbmaster->totalValue = $value->totalValue;
                //         $ewbmaster->totInvValue = $value->totInvValue;
                //         $ewbmaster->cgstValue = $value->cgstValue;
                //         $ewbmaster->sgstValue = $value->sgstValue;
                //         $ewbmaster->igstValue = $value->igstValue;
                //         $ewbmaster->cessValue = $value->cessValue;
                //         $ewbmaster->transporterId = $value->transporterId;
                //         $ewbmaster->transporterName = $value->transporterName;
                //         $ewbmaster->status = $value->status;
                //         $ewbmaster->actualDist = $value->actualDist;
                //         $ewbmaster->noValidDays = $value->noValidDays;
                //         $ewbmaster->transitDays = $value->transitDays;
                //         $ewbmaster->remainDist = $value->remainDist;
                //         $ewbmaster->remainDays = $value->remainDays;
                //         $ewbmaster->validUpto = $value->validUpto;
                //         $ewbmaster->extendedTimes = $value->extendedTimes;
                //         $ewbmaster->rejectStatus = $value->rejectStatus;
                //         $ewbmaster->vehicleType = $value->vehicleType;
                //         $ewbmaster->actFromStateCode = $value->actFromStateCode;
                //         $ewbmaster->actToStateCode = $value->actToStateCode;
                //         $ewbmaster->transactionType = $value->transactionType;
                //         $ewbmaster->otherValue = $value->otherValue;
                //         $ewbmaster->cessNonAdvolValue = $value->cessNonAdvolValue;
                //         $ewbmaster->child_updMode = $v->updMode;
                //         $ewbmaster->child_vehicleNo = $v->vehicleNo;
                //         $ewbmaster->child_fromPlace = $v->fromPlace;
                //         $ewbmaster->child_fromState = $v->fromState;
                //         $ewbmaster->child_tripshtNo = $v->tripshtNo;
                //         $ewbmaster->child_userGSTINTransin = $v->userGSTINTransin;
                //         $ewbmaster->child_enteredDate = $enteredDate;
                //         $ewbmaster->child_transMode = $v->transMode;
                //         $ewbmaster->child_transDocNo = $v->transDocNo;
                //         $ewbmaster->child_transDocDate = $transDocDate;
                //         $ewbmaster->child_groupNo = $v->groupNo;

                //         $ewbmaster->save();

                //     }
                // }
            }

        }




        // else
        // {
        //     foreach ($value as $k => $v)
        //         $ewaybill->$k = $v;

        //     $ewaybill->save();
        // }

        /////////////////////////// UPDATE VEHICLES ////////////////////////////////
        $result = ['code' => $response->getStatusCode(), 'result' => $value];
        return $result;

		/////////////////////////// END UPDATE VEHICLES /////////////////////////////

        // }

        // catch (GuzzleHttp\Exception\BadResponseException $e) {

		// 	/// Update GST CALL
		// 	self::$_ci->kaabar->save('companies', ['gst_call' => ($gstCall-1)], ['id' => self::$_company]);

        //     if ($e->hasResponse()){
		//     	$response = $e->getResponse();
		//     	$errors = json_decode($response->getBody())->error->error_cd;
		//     	$errorsCodes = preg_replace("/[^0-9]/", "", explode(', ', $errors));
		//     	$result = ['code' => $response->getStatusCode(), 'errors' => $errorsCodes];
		//     	return $result;
		//     }
		// }
	}

}
