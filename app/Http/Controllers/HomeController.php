<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StoreInstrument;
use App\Encounter;
use Auth;
use App\StoreLocation;
use App\User;

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
        $ins = StoreInstrument::where('store_location_id', Auth::user()->store_location_id)->get();

        return view('home', compact('ins'));
    }

    public function techHome(){
      $ens = Encounter::where('complete', 0)->get();
      return view('tech-home', compact('ens'));
    }


    public function admin(){
      $stores = StoreLocation::all();
      $techs = User::all();
      return view('admin-home', compact('stores', 'techs'));
    }

}
