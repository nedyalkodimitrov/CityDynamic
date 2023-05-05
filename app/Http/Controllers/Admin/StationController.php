<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusStation;
use App\Models\City;
use Illuminate\Http\Request;

class StationController extends Controller
{
    public function showStations()
    {
        $busStations = BusStation::all();
        return view('admin.pages.station.stations')->with('busStations', $busStations);
    }

    public function showStation($busStationId)
    {
        $busStation = BusStation::find($busStationId);

        return view('admin.pages.station.station')->with('busStation', $busStation);
    }

    public function showStationCreate()
    {
        $cities = City::all();

        return view('admin.pages.station.stationCreate')->with('cities', $cities);
    }

    public function showStationEdit()
    {
        $cities = City::all();
        return view('admin.pages.station.stationEdit')->with('cities', $cities);
    }

    public function createStation(Request $request){
        $busStation = new BusStation();
        $busStation->name = $request->name;
        $busStation->city = $request->city;
        $busStation->save();

        return redirect()->route('showStations');
    }

    public function editStation($busStationId, Request $request){
        $busStation = BusStation::find($busStationId);
        $busStation->name = $request->name;
        $busStation->city = $request->city;
        $busStation->save();

        return redirect()->route('showStations');
    }

}
