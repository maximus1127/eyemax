<?php

namespace App\Http\Controllers;

use App\Encounter;
use Illuminate\Http\Request;
use App\StoreLocation;
use Auth;
use App\UnassignedAutorefractor;
use App\Events\AddEncounter;

class EncounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function truvision(Encounter $encounter)
    {
      // dd($encounter);
        return view('truvision.controller')->with(['en'=>$encounter]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $en = new Encounter();
        $en->store_location_id = $request->location;
        $en->pt_id = $request->pt_id;
        $en->pt_name = $request->pt_name;
        $en->save();
    }

    public function getActive(Request $request)
    {
        $loc = StoreLocation::where('store_number', $request->location)->first();
        $ens = Encounter::where('complete', 0)->where('store_location_id', $loc->id)->get();
        return response()->json($ens);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Encounter  $encounter
     * @return \Illuminate\Http\Response
     */
    public function show(Encounter $encounter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Encounter  $encounter
     * @return \Illuminate\Http\Response
     */
    public function edit(Encounter $encounter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Encounter  $encounter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Encounter $encounter)
    {
        $en = Encounter::where('pt_id', $request->patient)->first();
        empty($request->ar['ar01'])? :$en->ar01 = str_replace(" ","", $request->ar['ar01']);
        empty($request->ar['ar02'])? :$en->ar02 = str_replace(" ","", $request->ar['ar02']);
        empty($request->ar['ar03'])? :$en->ar03 = str_replace(" ","", $request->ar['ar03']);
        empty($request->ar['ar04'])? :$en->ar04 = str_pad(str_replace(" ","", $request->ar['ar04']), 3, "0", STR_PAD_LEFT);
        empty($request->ar['ar05'])? :$en->ar05 = str_replace(" ","", $request->ar['ar05']);
        empty($request->ar['ar06'])? :$en->ar06 = str_replace(" ","", $request->ar['ar06']);
        empty($request->ar['ar07'])? :$en->ar07 = str_pad(str_replace(" ","", $request->ar['ar07']), 3, "0", STR_PAD_LEFT);
        empty($request->ar['ar08'])? :$en->ar08 = str_replace(" ","", $request->ar['ar08']);
        empty($request->ar['ar09'])? :$en->ar09 = str_replace(" ","", $request->ar['ar09']);
        empty($request->ar['ar10'])? :$en->ar10 = str_replace(" ","", $request->ar['ar10']);
        empty($request->ar['ar11'])? :$en->ar11 = str_replace(" ","", $request->ar['ar11']);
        empty($request->ar['ar12'])? :$en->ar12 = str_replace(" ","", $request->ar['ar12']);
        empty($request->ar['ar13'])? :$en->ar13 = str_replace(" ","", $request->ar['ar13']);
        empty($request->ar['ar14'])? :$en->ar14 = str_replace(" ","", $request->ar['ar14']);
        empty($request->ar['ar15'])? :$en->ar15 = str_replace(" ","", $request->ar['ar15']);
        empty($request->ar['la01'])? :$en->la01 = str_replace(" ","", $request->ar['la01']);
        empty($request->ar['la02'])? :$en->la02 = str_replace(" ","", $request->ar['la02']);
        empty($request->ar['la03'])? :$en->la03 = str_pad(str_replace(" ","", $request->ar['la03']), 3, "0", STR_PAD_LEFT);
        empty($request->ar['la04'])? :$en->la04 = str_replace(" ","", $request->ar['la04']);
        empty($request->ar['la05'])? :$en->la05 = str_replace(" ","", $request->ar['la05']);
        empty($request->ar['la06'])? :$en->la06 = str_replace(" ","", $request->ar['la06']);
        empty($request->ar['la07'])? :$en->la07 = str_pad(str_replace(" ","", $request->ar['la07']), 3, "0", STR_PAD_LEFT);
        empty($request->ar['la08'])? :$en->la08 = str_replace(" ","", $request->ar['la08']);
        $oldAr = UnassignedAutorefractor::find($request->ar['id']);
        if($oldAr){
          $oldAr->complete = 1;
          $oldAr->save();
        }
        $en->save();
    }


    //enter pushed twice on control screen, fires socket to reset home window
    public function finalize(Request $request){
      event(new AddEncounter($request->encounter, $request->finalInfo, $request->location));
    }

    //this is the route from the socket command in "finalize" above. it is the last step before the home screen is reset for a new patient.
    public function complete(Request $request)
    {

      $e = Encounter::where('pt_id', $request->encounter)->first();
      $e->ap01 = $request->finalInfo[15];
      $e->ap02 = $request->finalInfo[16];
      $e->ap03 = $request->finalInfo[17];
      $e->ap04 = $request->finalInfo[18];
      $e->ap05 = $request->finalInfo[19];
      $e->ap06 = $request->finalInfo[20];
      $e->ap07 = $request->finalInfo[21];
      $e->ap08 = $request->finalInfo[22];
      $e->ap09 = $request->finalInfo[23];
      $e->ap10 = $request->finalInfo[24];
      $e->ap11 = $request->finalInfo[25];
      $e->ap12 = $request->finalInfo[26];
      $e->ap13 = $request->finalInfo[27];
      $e->ap14 = $request->finalInfo[28];
      $e->ap15 = $request->finalInfo[29];
      $e->ap16 = $request->finalInfo[30];
      $e->ap17 = $request->finalInfo[31];
      $e->ap18 = $request->finalInfo[32];
      $e->ap19 = $request->finalInfo[33];
      $e->ap20 = $request->finalInfo[34];
      $e->complete = 1;
      if($e->save()){
        return "saved";
      }else {
        return "failed";
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Encounter  $encounter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Encounter $encounter)
    {
        //
    }
}
