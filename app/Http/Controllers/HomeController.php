<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StoreInstrument;
use App\Encounter;
use Auth;
use App\StoreLocation;
use App\User;
use App\Instrument;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $ins = Instrument::where('id', Auth::user()->store_location_id->instrument)->get();
        // $ins = Auth::user()->storeLocation->instrument;

        return view('home');
    }

    public function techHome(){
      $ens = Encounter::where('complete', 0)->get();
      return view('tech-home', compact('ens'));
    }


    public function admin(){
      $stores = StoreLocation::all();
      $techs = User::all();
      $instruments = Instrument::all();
      return view('admin-home', compact('stores', 'techs', 'instruments'));
    }

    public function getInstrument(Request $request){
      $store = StoreLocation::where('store_number', $request->store)->first();
      $ins = $store->instrument;
      return $ins;
    }

}
