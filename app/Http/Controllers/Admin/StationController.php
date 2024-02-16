<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Station;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;

class StationController extends Controller
{
    public function showStations()
    {
        $busStations = Station::all();
        return view('admin.pages.stations.stations')->with('stations', $busStations);
    }

    public function showStation($busStationId)
    {
        $busStation = Station::find($busStationId);
        $cities = City::all();
        $users = User::all();


        return view('admin.pages.stations.station')->with('station', $busStation)->with('cities', $cities)->with('users', $users);
    }

    public function showStationCreate()
    {

        $cities = City::all();
        $users = User::all();

        return view('admin.pages.stations.stationForm')->with('cities', $cities)->with('users', $users);
    }


    public function createStation(Request $request)
    {
        $busStation = new Station();
        $busStation->name = $request->name;
        $busStation->admin = $request->admin;
        $busStation->city = $request->city;
        $busStation->save();

        return redirect()->route('admin.showStations');
    }

    public function editStation($busStationId, Request $request)
    {
        $busStation = Station::find($busStationId);
        $busStation->name = $request->name;
        $busStation->admin = $request->admin;
        $busStation->city = $request->city;
        $busStation->save();

        return redirect()->route('admin.showStations');
    }

}
