<?php

namespace App\Http\Controllers;

use App\Encounter;
use Illuminate\Http\Request;
use App\StoreLocation;
use Auth;
use App\UnassignedAutorefractor;

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
        empty($request->ar['ar01'])? :$en->ar01 = $request->ar['ar01'];
        empty($request->ar['ar02'])? :$en->ar02 = $request->ar['ar02'];
        empty($request->ar['ar03'])? :$en->ar03 = $request->ar['ar03'];
        empty($request->ar['ar04'])? :$en->ar04 = $request->ar['ar04'];
        empty($request->ar['ar05'])? :$en->ar05 = $request->ar['ar05'];
        empty($request->ar['ar06'])? :$en->ar06 = $request->ar['ar06'];
        empty($request->ar['ar07'])? :$en->ar07 = $request->ar['ar07'];
        empty($request->ar['ar08'])? :$en->ar08 = $request->ar['ar08'];
        empty($request->ar['ar09'])? :$en->ar09 = $request->ar['ar09'];
        empty($request->ar['ar10'])? :$en->ar10 = $request->ar['ar10'];
        empty($request->ar['ar11'])? :$en->ar11 = $request->ar['ar11'];
        empty($request->ar['ar12'])? :$en->ar12 = $request->ar['ar12'];
        empty($request->ar['ar13'])? :$en->ar13 = $request->ar['ar13'];
        empty($request->ar['ar14'])? :$en->ar14 = $request->ar['ar14'];
        empty($request->ar['ar15'])? :$en->ar15 = $request->ar['ar15'];
        empty($request->ar['la01'])? :$en->la01 = $request->ar['la01'];
        empty($request->ar['la02'])? :$en->la02 = $request->ar['la02'];
        empty($request->ar['la03'])? :$en->la03 = $request->ar['la03'];
        empty($request->ar['la04'])? :$en->la04 = $request->ar['la04'];
        empty($request->ar['la05'])? :$en->la05 = $request->ar['la05'];
        empty($request->ar['la06'])? :$en->la06 = $request->ar['la06'];
        empty($request->ar['la07'])? :$en->la07 = $request->ar['la07'];
        empty($request->ar['la08'])? :$en->la08 = $request->ar['la08'];
        $oldAr = UnassignedAutorefractor::find($request->ar['id']);
        if($oldAr){
          $oldAr->complete = 1;
          $oldAr->save();
        }
        $en->save();
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
