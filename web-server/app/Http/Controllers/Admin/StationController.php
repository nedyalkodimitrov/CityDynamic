<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\StationRepository;
use App\Http\Requests\Admin\Station\CreateStationRequest;
use App\Http\Requests\Admin\Station\EditStationRequest;
use App\Models\City;
use App\Models\Station;
use App\Models\User;

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

    public function createStation(CreateStationRequest $request, StationRepository $stationRepository)
    {
        $request->validated();

        $stationRepository->create([
            'name' => $request->name,
            'city_id' => $request->city,
            'contact_email' => $request->contactEmail,
            'contact_phone' => $request->contactPhone,
            'contact_address' => $request->contactAddress,
        ]);

        return redirect()->route('admin.showStations');
    }

    public function editStation(Station $stationId, EditStationRequest $request, StationRepository $stationRepository)
    {
        $request->validated();

        $stationRepository->update($stationId, [
            'name' => $request->name,
            'city_id' => $request->city,
            'contact_email' => $request->contactEmail,
            'contact_phone' => $request->contactPhone,
            'contact_address' => $request->contactAddress,
        ]);

        return redirect()->route('admin.showStations');
    }
}
