<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EwayBillController;
use App\Http\Controllers\GlobalSettingsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

route::get('userlogin',function(){
    return view('BackEnd/login');
});

Auth::routes();

route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

//// EWAYBILL ROUTES
route::get('ewb',[EwayBillController::class,"index"])->name('ewb');
route::get('ewb/getsingle',[EwayBillController::class,"getSingleEwb"])->name('ewb.getsingle');
route::get('ewb/group',[EwayBillController::class,"group"])->name('ewb.group');
route::get('ewb/tracking',[EwayBillController::class,"tracking"])->name('ewb.tracking');


Route::get('tempsession', [GlobalSettingsController::class,'tempsession']);

Route::resource('settings', GlobalSettingsController::class);






