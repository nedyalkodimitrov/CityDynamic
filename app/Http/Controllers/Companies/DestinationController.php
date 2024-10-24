<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Http\Repositories\BusRepository;
use App\Http\Repositories\CompanyRepository;
use App\Http\Repositories\DestinationPointRepository;
use App\Http\Repositories\DestinationRepository;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DestinationController extends Controller
{
    public function __construct(private CompanyRepository $companyRepository,
        private DestinationRepository $destinationRepository,
        private BusRepository $busRepository,
        private DestinationPointRepository $destinationPointRepository
    ) {}

    public function showDestinations()
    {
        $user = Auth::user();
        $company = $user->getCompany();
        $destinations = $this->destinationRepository->getDestinationsByCompany($company->id);

        return view('companies.pages.destinations.destinations', [
            'destinations' => $destinations,
        ]);
    }

    public function showDestination($destinationId)
    {
        $user = Auth::user();
        $company = $user->getCompany();

        $destination = $this->destinationRepository->findById($destinationId);
        $tracks = $this->destinationRepository->getTracks($destination);

        $connectedStations = $company->stations;

        return view('companies.pages.destinations.destination',
            [
                'destination' => $destination,
                'tracks' => $tracks,
                'connectedStations' => $connectedStations,
            ]);
    }

    public function showDestinationCreate()
    {
        $user = Auth::user();
        $company = $user->getCompany();
        $busStations = $company->stations;

        return view('companies.pages.destinations.destinationForm',
            [
                'busStations' => $busStations,
            ]);

    }

    public function createDestination(Request $request)
    {
        $user = Auth::user();
        $company = $user->getCompany();

        $stations = $this->extractStationsFromRequest($request);

        $firstStation = $stations[0];
        $lastStation = $stations[count($stations) - 1];
        $destination = $this->destinationRepository->create($request->name, $firstStation, $lastStation, $company);

        $order = 1;
        foreach ($stations as $station) {
            $this->destinationPointRepository->create($destination->id, $station, $order);
            $order++;
        }

        return redirect()->route('company.showDestinations');
    }

    public function editDestination($destinationId, Request $request)
    {
        //todo refactor this to work with destination points
        $destination = Destination::find($destinationId);
        $destination->name = $request->name;
        $destination->startBusStation = $request->startBusStation;
        $destination->endBusStation = $request->endBusStation;
        $destination->save();

        return redirect()->route('company.showDestinations');
    }

    public function deleteDestination($destinationId)
    {
        // todo can delete it if it has no courses
        $destination = Destination::find($destinationId);
        $destination->delete();

        return redirect()->route('showDestinations');
    }

    private function extractStationsFromRequest($request)
    {
        $i = 1;
        $stationFix = 'station-'.$i;
        $stations = [];
        while (isset($request->$stationFix)) {
            array_push($stations, $request->$stationFix);
            $i++;
            $stationFix = 'station-'.$i;
        }

        return $stations;
    }
}
