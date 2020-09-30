<?php

namespace App\Http\Controllers;

use App\UnassignedLensometer;
use Illuminate\Http\Request;
use App\StoreLocation;

class UnassignedLensometerController extends Controller
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

    public function getAll(Request $request){
      $store = StoreLocation::where('store_number', $request->location)->first();
      $lms = UnassignedLensometer::where('store_location_id', $store->id)->where('complete', 0)->get();
      return response()->json($lms);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UnassignedLensometer  $unassignedLensometer
     * @return \Illuminate\Http\Response
     */
    public function show(UnassignedLensometer $unassignedLensometer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UnassignedLensometer  $unassignedLensometer
     * @return \Illuminate\Http\Response
     */
    public function edit(UnassignedLensometer $unassignedLensometer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UnassignedLensometer  $unassignedLensometer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnassignedLensometer $unassignedLensometer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UnassignedLensometer  $unassignedLensometer
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnassignedLensometer $unassignedLensometer)
    {
        //
    }
}
