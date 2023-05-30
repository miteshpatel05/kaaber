<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Expr\Print_;

class DashboardController extends Controller
{
    public function index(){

        // return view('BackEnd.dashboard');

    }

    public function get_api_data($id=null){

        // return view('BackEnd.dashboard');

        // to get data from any site/api
        // $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        $response = Http::get('https://jsonplaceholder.typicode.com/posts/'.$id);
        $data = $response->collect();
        echo "<pre>";
        print_r($data);

        return view('BackEnd.dashboard',compact('data'));

    }

    public function add_api_data(){
        $response = Http::post('https://reqres.in/api/users',[
            'name' => 'mitesh',
            'job' => 'programmer',
        ]);
        dd($response->json());

    }

    public function update_api_data($id=null){
        $response = Http::put('https://reqres.in/api/users/'.$id,[
            'name' => 'navin',
            'job' => 'bussiness',
        ]);
        dd($response->json());
    }

    public function delete_api_data($id=null){
        $response = Http::delete('https://reqres.in/api/users/'.$id);
        dd($response->json());
    }

    public function getinfo(){
        // some usefull functions of api
        $response = Http::get('https://jsonplaceholder.typicode.com/posts/1');

        // for perticular field
        // $response = Http::get('https://jsonplaceholder.typicode.com/posts/1')['title'];

        // to wait for 5 second for response
        // $response = Http::timeout(5)->get('https://jsonplaceholder.typicode.com/posts');

        // to wait for 100 mili second for post data then retry up to 3 time
        // $response = Http::retry(3,100)->post('https://reqres.in/api/users',[
                                            //     'name' => 'mitesh',
                                            //     'job' => 'programmer',
                                            // ]);

            // $response = Http::withHeaders(['Content-type'=>'aplication/json'])->post('https://reqres.in/api/users',[ 'name' => 'mitesh',
                       //     'job' => 'programmer',
                       // ]);

        dd($response);
        dd($response->collect());
        dd($response->collect()->all());
        dd($response->json());
        dd($response->body());
        dd($response->status());
        dd($response->ok());
        dd($response->successful());
        dd($response->failed());
        dd($response->serverError());
        dd($response->clientError());
        dd($response->headers());


    }


}


