<?php

namespace App\Http\Controllers\Stations;

use App\Http\Controllers\Controller;
use App\Http\Repositories\StationRepository;

class DestinationController extends Controller
{
    public function __construct(private StationRepository $stationRepository) {}

    public function showDestinations()
    {
        $user = \Auth::user();
        $station = $user->getStation();

        return view('stations.pages.destinations.destinations', [
            'destinations' => $station->destinations,
        ]);

    }

    public function showDestination($id)
    {
        $user = \Auth::user();
        $station = $user->getStation();

        return view('stations.pages.destinations.destination', [
            'destination' => $this->stationRepository->getDestination($station, $id),
        ]);
    }
}
