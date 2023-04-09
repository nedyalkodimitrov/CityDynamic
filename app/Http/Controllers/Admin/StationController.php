<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StationController extends Controller
{
    public function showStations()
    {
        return view('admin.pages.station.stations');
    }

    public function showStation()
    {
        return view('admin.pages.station.station');
    }

    public function showStationCreate()
    {
        return view('admin.pages.station.stationCreate');
    }

    public function showStationEdit()
    {
        return view('admin.pages.station.stationEdit');
    }
}
