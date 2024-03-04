<?php

namespace App\Http\Controllers\Stations;

use App\Http\Controllers\Controller;
use App\Http\Repositories\StationRepository;
use Illuminate\Http\Request;

class DestinationController extends Controller
{


    public function __construct(private StationRepository $stationRepository)
    {
    }

    public function showDestinations()
    {
        $user = auth()->user();
        $station = $this->stationRepository->getStationOfUser($user);

        return view('stations.pages.destinations.destinations', [
            'destinations' => $station->getDestinations
        ]);

    }

    public function showDestination($id)
    {
        $user = auth()->user();
        $station = $this->stationRepository->getStationOfUser($user);

        return view('stations.pages.destinations.destination', [
            'destination' => $this->stationRepository->getDestination($station, $id)
        ]);

    }
}
