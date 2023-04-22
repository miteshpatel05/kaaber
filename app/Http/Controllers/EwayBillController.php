<?php

namespace App\Http\Controllers;

use App\Library\EwbHelper;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use App\Models\setting;
use App\Models\ewaybill;
use SebastianBergmann\Type\TrueType;

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
    public function index()
    {

        // $abc = Session('mitesh');
        // if($abc==""){
        //     Session()->put('mitesh', '456');
        //     echo "in the if loop";
        // }
        // echo Session('mitesh');
        // // Session()->pull('mitesh');

        //'http://gstsandbox.charteredinfo.com/ewaybillapi/dec/v1.03/auth?'
        // return view('home');

        // if(!Session('authToken')){
        //     Session()->put('authToken',  $this->ewb->generateToken());
        //     $token =Session('authToken');

        // }


        $GetEwayBillsByDate = $this->GetData('GetEwayBillsByDate');
        // $GetEwayBillsForTransporter = $this->GetData('GetEwayBillsForTransporter');
        // $GetEwayBill

        foreach($GetEwayBillsByDate as $value){
            $GetEwayBill =$this->GetEwayBill($value->ewbNo,$this->token);
            echo "<pre>";
            print_r($GetEwayBill);
        }exit;

        echo "<pre>";
        print_r($GetEwayBillsByDate);
        // $GetEwayBillsByDate = $this->GetData('GetEwayBillsByDate');
        exit;

        return view('BackEnd.dashboard');exit;


        // $params['action'] = 'ACCESSTOKEN';
        $params['action'] = 'GetEwayBillsByDate';
        // $params['action'] = 'GetEwayBill';
        $params['aspid'] = '1624731119';
        $params['password'] = 'Martin55!@';
        $params['gstin'] = '34AACCC1596Q002';
        $params['username'] = 'TaxProEnvPON';
        $params['ewbpwd'] = 'abc34*';
        $params['authtoken'] = 'MeNNKm0vqzm10u1WJPcvEU1Uw';
        $params['date'] = '06/04/2023';
        // $params['ewbNo'] = '531008881673';


        $api = 'http://gstsandbox.charteredinfo.com/ewaybillapi/dec/v1.03/ewayapi?';
        //$tokenurl = 'http://gstsandbox.charteredinfo.com/ewaybillapi/dec/v1.03/auth?';

        $url = $api.http_build_query($params);
        $response = Http::get($url);
        $data = json_decode($response->body());

        echo '<pre>';
        print_r($data);exit;
    }

    /**
     * Get Single Ewaybill Using API.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getSingleEwb(){

        $ewbs = $this->ewb->getEwbByDate(date('20/m/Y'));

        foreach ($ewbs as $key => $value) {
            $this->ewb->getEwb($value->ewbNo);
        }
        echo 'sucess';
        exit;

        echo '<pre>';
        print_r(unserialize($ewbNo['result']->VehiclListDetails));exit;
    }

    /**
     * Get All Statewise Ewaybills Using API.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     * GetEwayBillsForTransporterByState
     */
    public function getStatewiseEwb(){
        return 'welcome to group';
    }

    /**
     * Show the Ewaybill Group Page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function group(){
        return 'welcome to group';
    }

    /**
     * Show the Ewaybill Tracking Page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function tracking(){
        return 'welcome to tracking';
    }





}
