<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\StationRepository;
use App\Models\City;
use App\Models\Station;
use App\Models\User;
use Illuminate\Http\Request;

class StationController extends Controller
{
    public function showStations()
    {
        $busStations = Station::all();

        return view('admin.pages.stations.stations', [
            'stations' => $busStations,
        ]);
    }

    public function showStation(Station $id)
    {
        $cities = City::all();
        $users = User::all();

        return view('admin.pages.stations.station', [
            'station' => $id,
            'cities' => $cities,
            'users' => $users,
        ]);
    }

    public function showStationCreate()
    {
        $cities = City::all();
        $users = User::all();

        return view('admin.pages.stations.stationForm', [
            'cities' => $cities,
            'users' => $users,
        ]);
    }

    public function createStation(Request $request, StationRepository $stationRepository)
    {
        $stationRepository->create([
            'name' => $request->name,
            'city_id' => $request->city,
            'contact_email' => $request->contact_email,
            'contact_phone' => $request->contact_phone,
            'contact_address' => $request->contact_address,
        ]);

        return redirect()->route('admin.showStations');
    }

    public function editStation(Station $stationId, Request $request, StationRepository $stationRepository)
    {
        $stationRepository->update($stationId, [
            'name' => $request->name,
            'city_id' => $request->city,
            'contact_email' => $request->contact_email,
            'contact_phone' => $request->contact_phone,
            'contact_address' => $request->contact_address,
        ]);

        return redirect()->route('admin.showStations');
    }
}
