<?php

namespace App\Http\Controllers;

use App\StoreLocation;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class StoreLocationController extends Controller
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
        $store = new StoreLocation();
        $store->name = $request->name;
        $store->store_number = $request->number;
        $store->street = $request->street;
        $store->city = $request->city;
        $store->state = $request->state;
        $store->instrument_id = $request->phor;
        $store->api_token = uniqid();
        $store->save();
    }

    public function addUser(Request $request)
    {
        $store = StoreLocation::where('store_number', $request->store)->first();
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->store_location_id = $store->id;
        $user->role= $request->position;
        $user->password = Hash::make($request->password);
        $user->save();
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\StoreLocation  $storeLocation
     * @return \Illuminate\Http\Response
     */
    public function show(StoreLocation $storeLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StoreLocation  $storeLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(StoreLocation $storeLocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StoreLocation  $storeLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StoreLocation $storeLocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StoreLocation  $storeLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(StoreLocation $storeLocation)
    {
        //
    }


    public function localFunctions(Request $request)
    {
      $store = StoreLocation::where('api_token', $request->api_token)->first();
      $phor = $store->phoropter->name ?? null;
      $lens = $store->lensometer->local_function ?? null;
      $ref = $store->refractor->name ?? null;
      return response()->json(["phor" => $phor, "lens" => $lens, "ref"=>$ref]);
    }











}
