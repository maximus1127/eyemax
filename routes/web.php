<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Notifications\RoutesNotifications;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/get-active-encounters', 'EncounterController@getActive');
Route::get('/get-unassigned-ar', 'UnassignedAutorefractorController@getAll');
Route::get('/get-unassigned-lm', 'UnassignedLensometerController@getAll');
Route::post('/assign-ar', 'EncounterController@update');

Route::get('/tech-home', 'HomeController@techHome');
Route::get('/truvision/{encounter}', 'EncounterController@truvision')->name('truvision');


//Truvision Routes

Route::get('/chart-signal', 'TruvisionController@chartSignal');
Route::get('patient-chart', 'TruvisionController@patientChart');


Route::post('/phoropter-sequence', "InstrumentController@marcoPhoropter");
