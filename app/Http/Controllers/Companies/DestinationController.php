<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Http\Repositories\BusRepository;
use App\Http\Repositories\CompanyRepository;
use App\Http\Repositories\DestinationRepository;
use App\Http\Repositories\StationRepository;
use App\Models\DestinationPoint;
use App\Models\Station;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\exactly;

class DestinationController extends Controller
{
    public function __construct(private CompanyRepository     $companyRepository,
                                private DestinationRepository $destinationRepository,
                                private BusRepository $busRepository,
                                )
    {
    }

    public function showDestinations()
    {
        $user = Auth::user();
        $company = $this->companyRepository->getCompanyOfUser($user);
        $destinations = $this->destinationRepository->getDestinationsByCompany($company->id);

        return view('companies.pages.destinations.destinations',[
            "destinations" => $destinations,
        ]);
    }

    public function showDestination($destinationId)
    {
        $user = Auth::user();
        $company = $this->companyRepository->getCompanyOfUser($user);


        $destination = $this->destinationRepository->findById($destinationId);
        $tracks = $this->destinationRepository->getTracks($destination);

        $connectedStations = $this->companyRepository->getConnectedStations($company);

        return view('companies.pages.destinations.destination',
        [
            "destination" => $destination,
            "tracks" => $tracks,
            "connectedStations" => $connectedStations
        ]);
    }

    public function showDestinationCreate()
    {
        $user = Auth::user();
        $company = $this->companyRepository->getCompanyOfUser($user);
        $busStations = $this->companyRepository->getConnectedStations($company);


        return view('companies.pages.destinations.destinationForm',
        [
            "busStations" => $busStations
        ]);

    }


    public function createDestination(Request $request)
    {
        $company = Auth::user()->getEmployers()->first();

        $i = 1;
        $stationFix = "station-" . $i;
        $stations = [];
        while (isset($request->$stationFix)) {
            array_push($stations, $request->$stationFix);
            $i++;
            $stationFix = "station- " . $i;
        }

        $firstStation = $stations[0];
        $lastStation = $stations[count($stations) - 1];
        $destination = new Destination();
        $destination->name = "тест";
        $destination->startBusStation = $firstStation;
        $destination->endBusStation = $lastStation;
        $destination->executiveCompany = $company->id;
        $destination->save();

        $order = 0;
        $duration = 5;
        $distance = 5;
        $price = 2;
        foreach ($stations as $station) {
            $destinationPoint = new DestinationPoint();
            $destinationPoint->destination = $destination->id;
            $destinationPoint->station = $station;
            $destinationPoint->order = $order;
            $destinationPoint->duration = $duration;
            $destinationPoint->distance = $distance;
            $destinationPoint->price = $price;
            $destinationPoint->save();
            $order++;
            $duration += 5;
            $price += 3;
            $duration += 20;
        }


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

        return redirect()->route('company.showDestinations');
    }

    public function deleteDestination($destinationId)
    {
        $destination = Destination::find($destinationId);
        $destination->delete();

        return redirect()->route('showDestinations');
    }


}
