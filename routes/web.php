<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EwayBillController;
use App\Http\Controllers\EwayWorkspaceController;
use App\Http\Controllers\GlobalSettingsController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

route::get('getLists',[EwayBillController::class,"getLists"])->name('ewb.getLists');

//// EWAYBILL ROUTES

Route::group(['middleware' => ['permission:operate.vehicle']], function () {
    route::get('EwayBillList',[EwayBillController::class,"index"])->name('ewb');
    route::post('getewaybilllist',[EwayBillController::class,"getEwayBillList"])->name('ewb.getEwayBillList');
    route::post('AddtoGroup',[EwayBillController::class,"AddtoGroup"])->name('ewb.AddtoGroup');
    route::post('SaveGroup',[EwayBillController::class,"SaveGroup"])->name('ewb.SaveGroup');
    route::get('EwayBills/Workspace',[EwayWorkspaceController::class,"index"])->name('ewb.Workspace');
    route::post('getGroupList',[EwayWorkspaceController::class,"getGroupList"])->name('ewb.getGroupList');
    route::get('EwayBills/Workspace/VehicleDetailView/{id}',[EwayWorkspaceController::class,"VehicleDetailView"])->name('work.VehicleDetailView');
    route::post('getVehicleDetailList',[EwayWorkspaceController::class,"getVehicleDetailList"])->name('work.getVehicleDetailList');
    route::post('updatelr',[EwayWorkspaceController::class,"UpdateLR"])->name('work.UpadateLR');
    route::post('savelr',[EwayWorkspaceController::class,"SaveLR"])->name('work.SaveLR');
    route::post('SaveTracking',[EwayWorkspaceController::class,"SaveTracking"])->name('work.SaveTracking');
    route::post('getTrackingHistory',[EwayWorkspaceController::class,"getTrackingHistory"])->name('work.getTrackingHistory');
    route::post('deleteTracking',[EwayWorkspaceController::class,"DeleteTracking"])->name('work.DeleteTracking');
    route::post('UngroupVehicle',[EwayWorkspaceController::class,"UngroupVehicle"])->name('work.UngroupVehicle');
    route::post('ExtendEWB',[EwayWorkspaceController::class,"ExtendEWB"])->name('work.ExtendEWB');

});

// route::get('AllVehicleEwaybillMasterData',[EwayBillController::class,"AllVehicleEwaybillMasterData"])->name('ewb.AllVehicleEwaybillMasterData');

route::get('ewb/getsingle',[EwayBillController::class,"getSingleEwb"])->name('ewb.getsingle');
route::get('ewb/group',[EwayBillController::class,"group"])->name('ewb.group');
route::get('ewb/tracking',[EwayBillController::class,"tracking"])->name('ewb.tracking');

Route::resource('settings', GlobalSettingsController::class);









