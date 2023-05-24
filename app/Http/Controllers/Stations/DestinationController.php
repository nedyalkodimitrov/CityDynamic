<?php

namespace App\Http\Controllers\Stations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function showDestinations(){
        $user   = auth()->user();
        $station = $user->getStation;
        $destinations = $station->getDestinations;
        return view('stations.pages.destinations.destinations')->with('destinations', $destinations);

    }public function showDestination($id){
        $user   = auth()->user();
        $station = $user->getStation;
        $destination = $station->getDestinations()->where("id", $id)->first();
        return view('stations.pages.destinations.destination')->with('destination', $destination);

    }
}
