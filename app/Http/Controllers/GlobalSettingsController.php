<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Session;

class GlobalSettingsController extends Controller
{
     /**
     * Display a listing of the resource.
     */


    public function index()
    {

        // $SettingsData = setting::all();

        // $columnname =$SettingsData->pluck('name');
        // $columnvalue =$SettingsData->pluck('value');
        // $AllSettings = array_flip($columnname->toArray());

        // $i = 0;
        // foreach($AllSettings as $key => $value){
        //     $AllSettings[$key] = $columnvalue[$i];
        //     $i++;

        // }
        // // dd($AllSettings);
        // return view('BackEnd.global-settings',compact('AllSettings'));

        $SettingsData = setting::all();
        return view('BackEnd.global-settings',compact('SettingsData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

         foreach ($request->post("settings") as $key => $value) {
            if($value==null)
                $value="";
            $update = setting::where("id",$key)->update(['value' => $value]);
          }

          return redirect()->route('settings.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function tempsession(){
        $abc = Session('mitesh');

        if($abc==""){
            Session()->put('mitesh', '456');
            echo "in the if loop";
        }
        echo Session('mitesh');
        // Session()->pull('mitesh');
    }
}
