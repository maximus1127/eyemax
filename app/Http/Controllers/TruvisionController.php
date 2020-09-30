<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\ChartSignal;

class TruvisionController extends Controller
{
    public function chartSignal(Request $request)
    {
      event(new ChartSignal($request->size, $request->location));
    }

    public function patientChart(){
      return view('truvision.patient');
    }
}
