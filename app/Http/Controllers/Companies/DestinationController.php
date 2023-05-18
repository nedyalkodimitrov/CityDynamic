<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Models\BusStation;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DestinationController extends Controller
{
    public function showDestinations()
    {
        $destinations = Destination::all();

        return view('companies.pages.destinations.destinations')->with('destinations', $destinations);
    }

    public function showDestination($destinationId)
    {
        $destination = Destination::find($destinationId);
        return view('companies.pages.destination.destination')->with('destination', $destination);
    }

    public function showDestinationCreate()
    {
        $user = Auth::user();
        $busStations = $user->getCompany->getStations;

        return view('companies.pages.destinations.destinationForm')->with('busStations', $busStations);
    }


    public function createDestination(Request $request)
    {
        $destination = new Destination();
        $destination->name = $request->name;
        $destination->startBusStation = $request->startBusStation;
        $destination->endBusStation = $request->endBusStation;
        $destination->save();

        return redirect()->route('company.showDestinations');
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
