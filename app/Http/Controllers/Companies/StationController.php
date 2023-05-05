<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StationController extends Controller
{
    public function showStations()
    {
        return view('admin.pages.stations.stations');
    }
    public function showStation()
    {
        return view('admin.pages.stations.station');
    }
    public function makeStationRequest()
    {

    }

    public function declineStationRequest()
    {

    }





}
