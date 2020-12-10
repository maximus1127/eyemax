<?php

namespace App\Http\Controllers;

use App\UnassignedAutorefractor;
use App\UnassignedLensometer;
use Illuminate\Http\Request;
use App\StoreLocation;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Auth;
use App\Events\AddEncounter;
use Illuminate\Support\Facades\Log;
class UnassignedAutorefractorController extends Controller
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


    public function getAll(Request $request)
    {
        $store = StoreLocation::where('store_number', $request->location)->first();
        $ars = UnassignedAutorefractor::where('store_location_id', $store->id)->where('complete', 0)->get();
        return response()->json($ars);
    }


    public function alertMarco(Request $request){
        event(new AddEncounter($request->location));
    }

    public function receiveMarco(Request $request) //applies AR and LM and KM
    {

        $store = StoreLocation::where('store_number', $request->location)->first();
        $xml = XmlParser::load($request->file('marco'));
        $ar = $xml->parse([
            'ar02' => ['uses' => 'DataSet.RM_Data_OD.Sphere_OD'],
            'ar03' => ['uses' => 'DataSet.RM_Data_OD.Cylinder_OD'],
            'ar04' => ['uses' => 'DataSet.RM_Data_OD.Axis_OD'],
            'ar05' => ['uses' => 'DataSet.RM_Data_OS.Sphere_OS'],
            'ar06' => ['uses' => 'DataSet.RM_Data_OS.Cylinder_OS'],
            'ar07' => ['uses' => 'DataSet.RM_Data_OS.Axis_OS'],
            'ar08' => ['uses' => 'DataSet.KM_Data_OD.KM_Diopt_R1_OD'],
            'ar09' => ['uses' => 'DataSet.KM_Data_OD.KM_mm_FlatAXS_OD'],
            'ar10' => ['uses' => 'DataSet.KM_Data_OS.KM_Diopt_R1_OS'],
            'ar11' => ['uses' => 'DataSet.KM_Data_OS.KM_mm_FlatAXS_OS'],
            'ar12' => ['uses' => 'DataSet.KM_Data_OD.KM_Diopt_R2_OD'],
            'ar13' => ['uses' => 'DataSet.KM_Data_OD.KM_mm_SteepAXIS_OD'],
            'ar14' => ['uses' => 'DataSet.KM_Data_OS.KM_Diopt_R2_OS'],
            'ar15' => ['uses' => 'DataSet.KM_Data_OS.KM_mm_SteepAXIS_OS'],
            'ar01' => ['uses' => 'DataSet.RM_Data_OU.PD'],
            'la01' => ['uses' => 'DataSet.Presenting_Data_OD.Sphere_OD'],
            'la02' => ['uses' => 'DataSet.Presenting_Data_OD.Cylinder_OD'],
            'la03' => ['uses' => 'DataSet.Presenting_Data_OD.Axis_OD'],
            'la04' => ['uses' => 'DataSet.Presenting_Data_OD.Add_OD'],
            'la05' => ['uses' => 'DataSet.Presenting_Data_OS.Sphere_OS'],
            'la06' => ['uses' => 'DataSet.Presenting_Data_OS.Cylinder_OS'],
            'la07' => ['uses' => 'DataSet.Presenting_Data_OS.Axis_OS'],
            'la08' => ['uses' => 'DataSet.Presenting_Data_OS.Add_OS'],
        ]);

        if($ar["ar02"] == null && $ar["ar03"] == null && $ar["ar04"] == null && $ar["ar05"] == null && $ar["ar06"] == null && $ar["ar07"] == null && $ar["ar08"] == null && $ar["ar09"] == null && $ar["ar10"] == null && $ar["ar11"] == null && $ar["ar12"] == null && $ar["ar13"] == null && $ar["ar14"] == null && $ar["ar15"] == null){
          $ul = new UnassignedLensometer();
          $ul->la01 = $ar['la01'];
          $ul->la02 = $ar['la02'];
          $ul->la03 = $ar['la03'];
          $ul->la04 = $ar['la04'];
          $ul->la05 = $ar['la05'];
          $ul->la06 = $ar['la06'];
          $ul->la07 = $ar['la07'];
          $ul->la08 = $ar['la08'];
          $ul->store_location_id = $store->id;
          if ($ul->save()) {
              return response("200");
          }
        } else {
        $ua = new UnassignedAutorefractor();
        $ua->ar01 = $ar['ar01'];
        $ua->ar02 = str_replace(" ", "", $ar['ar02']) == "" ? null : $ar['ar02'];
        $ua->ar03 = str_replace(" ", "", $ar['ar03']) == "" ? null : $ar['ar03'];
        $ua->ar04 = str_replace(" ", "", $ar['ar04']) == "" ? null : $ar['ar04'];
        $ua->ar05 = str_replace(" ", "", $ar['ar05']) == "" ? null : $ar['ar05'];
        $ua->ar06 = str_replace(" ", "", $ar['ar06']) == "" ? null : $ar['ar06'];
        $ua->ar08 = $ar['ar08'];
        $ua->ar09 = $ar['ar09'];
        $ua->ar10 = $ar['ar10'];
        $ua->ar07 = str_replace(" ", "", $ar['ar07']) == "" ? null : $ar['ar07'];
        $ua->ar11 = $ar['ar11'];
        $ua->ar12 = $ar['ar12'];
        $ua->ar13 = $ar['ar13'];
        $ua->ar14 = $ar['ar14'];
        $ua->ar15 = $ar['ar15'];
        $ua->la01 = $ar['la01'];
        $ua->la02 = $ar['la02'];
        $ua->la03 = $ar['la03'];
        $ua->la04 = $ar['la04'];
        $ua->la05 = $ar['la05'];
        $ua->la06 = $ar['la06'];
        $ua->la07 = $ar['la07'];
        $ua->la08 = $ar['la08'];
        $ua->store_location_id = $store->id;
        if ($ua->save()) {
            return response("200");
        }
    }
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UnassignedAutorefractor  $unassignedAutorefractor
     * @return \Illuminate\Http\Response
     */
    public function show(UnassignedAutorefractor $unassignedAutorefractor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UnassignedAutorefractor  $unassignedAutorefractor
     * @return \Illuminate\Http\Response
     */
    public function edit(UnassignedAutorefractor $unassignedAutorefractor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UnassignedAutorefractor  $unassignedAutorefractor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnassignedAutorefractor $unassignedAutorefractor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UnassignedAutorefractor  $unassignedAutorefractor
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnassignedAutorefractor $unassignedAutorefractor)
    {
        //
    }
}
