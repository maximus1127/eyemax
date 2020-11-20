<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\ChartSignal;
use App\StoreLocation;

class TruvisionController extends Controller
{
    public function chartSignal(Request $request)
    {
      event(new ChartSignal($request->size, $request->location));
    }

    public function patientChart(){
      return view('truvision.patient');
    }

    public function calibrate(Request $request){
      $store = StoreLocation::where('store_number', $request->location)->first()->update(['screen_calibration' => $request->calibration]);
    }
}
