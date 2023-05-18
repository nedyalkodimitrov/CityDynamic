<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusCompany;
use App\Models\BusStation;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;

class StationController extends Controller
{
    public function showStations()
    {
        $busStations = BusStation::all();
        return view('admin.pages.stations.stations')->with('stations', $busStations);
    }

    public function showStation($busStationId)
    {
        $busStation = BusStation::find($busStationId);
        $cities = City::all();
        $companyAdmins = User::role('Bus Station Admin')->get();
        $users = [];
        foreach ($companyAdmins as $busAdmin) {
            if ($busAdmin->getCompany == null){
                array_push($users, $busAdmin);
            }
        }

        return view('admin.pages.stations.station')->with('station', $busStation)->with('cities', $cities)->with('users', $users);
    }

    public function showStationCreate()
    {

        $cities = City::all();
        $companyAdmins = User::role('Bus Station Admin')->get();
        $users = [];
        foreach ($companyAdmins as $busAdmin) {
            if ($busAdmin->getCompany == null){
                array_push($users, $busAdmin);
            }
        }


        return view('admin.pages.stations.stationForm')->with('cities', $cities)->with('users', $users);
    }


    public function createStation(Request $request){
        $busStation = new BusStation();
        $busStation->name = $request->name;
        $busStation->admin = $request->admin;
        $busStation->city = $request->city;
        $busStation->save();

        return redirect()->route('showStations');
    }

    public function editStation($busStationId, Request $request){
        $busStation = BusStation::find($busStationId);
        $busStation->name = $request->name;
        $busStation->admin = $request->admin;
        $busStation->city = $request->city;
        $busStation->save();

        return redirect()->route('showStations');
    }

}
