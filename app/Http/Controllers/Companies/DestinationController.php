<?php

namespace App\Http\Controllers\Companies;

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

    public function createDestination(Request $request)
    {
        $destination = new Destination();
        $destination->name = $request->name;
        $destination->startBusStation = $request->startBusStation;
        $destination->endBusStation = $request->endBusStation;
        $destination->save();

        return redirect()->route('showDestinations');
    }

    public function editDestination($destinationId, Request $request)
    {
        $destination = Destination::find($destinationId);
        $destination->name = $request->name;
        $destination->startBusStation = $request->startBusStation;
        $destination->endBusStation = $request->endBusStation;
        $destination->save();

        return redirect()->route('showDestinations');
    }

    public function deleteDestination($destinationId)
    {
        $destination = Destination::find($destinationId);
        $destination->delete();

        return redirect()->route('showDestinations');
    }
}
