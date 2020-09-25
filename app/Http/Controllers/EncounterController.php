<?php

namespace App\Http\Controllers;

use App\Encounter;
use Illuminate\Http\Request;
use App\StoreLocation;
use Auth;

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
        //
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
