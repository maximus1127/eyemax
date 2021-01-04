<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:api')->post('/new-encounter', 'EncounterController@store');
Route::middleware('auth:api')->post('/receive-marco-ar', 'UnassignedAutorefractorController@receiveMarco');
Route::middleware('auth:api')->get('/get-local-functions', 'StoreLocationController@localFunctions');
// Route::middleware('auth:api')->post('/receive-lensometer', 'UnassignedLensometerController@store');
Route::post('/marco-alert', 'UnassignedAutorefractorController@alertMarco');





Route::middleware('auth:user_api')->get('/zoom-monitor', function(){
  return DB::select('select * from zoom_mon_ftp where id = ?', [1]);
});
