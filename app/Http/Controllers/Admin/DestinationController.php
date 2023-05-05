<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusStation;
use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function showDestinations()
    {
        $destinations = Destination::all();

        return view('admin.pages.destination.destinations')->with('destinations', $destinations);
    }

    public function showDestination($destinationId)
    {
        $destination = Destination::find($destinationId);
        return view('admin.pages.destination.destination')->with('destination', $destination);
    }

    public function showDestinationCreate()
    {
        $busStations = BusStation::all();
        return view('admin.pages.destination.destinationCreate')->with('busStations', $busStations);
    }

    public function showDestinationEdit()
    {
        $busStations = BusStation::all();
        return view('admin.pages.destination.destinationEdit')->with('busStations', $busStations);
    }
}
