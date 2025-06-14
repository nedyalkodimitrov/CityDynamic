<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Http\Repositories\CompanyRepository;
use App\Http\Resources\StationResource;
use App\Models\Station;
use Illuminate\Support\Facades\Auth;

class StationController extends Controller
{
    public function __construct(
        private CompanyRepository $companyRepository,
    ) {}

    public function showStations()
    {
        $user = Auth::user();
        $company = $user->getCompany();
        $connectedStations = $company->stations;

        $dissociateStations = $this->companyRepository->getDissociateStations($company);

        return view('companies.pages.stations.stations', [
            'connectedStations' => $connectedStations,
            'notConnectedStations' => $dissociateStations,
        ]);
    }

    public function showStation(Station $id)
    {
        $user = Auth::user();
        $company = $user->getCompany();

        $isRequestToThisStation = $this->companyRepository->checkIfThereIsRequestToThisStation($company, $id);
        $isApproved = $this->companyRepository->checkIfStationIsConnected($company, $id);

        return view('companies.pages.stations.station', [
            'station' => $id,
            'isRequestToThisStation' => $isRequestToThisStation,
            'isApproved' => $isApproved,
        ]);
    }

    public function sendStationRequest(Station $id)
    {
        $user = Auth::user();
        $company = $user->getCompany();

        $this->companyRepository->makeRequestToStation($company, $id);

        return redirect()->back();
    }

    public function rejectStationRequest(Station $stationId)
    {
        $user = Auth::user();
        $company = $user->getCompany();

        $this->companyRepository->removeRequestToStation($company, $stationId);

        return redirect()->route('company.showStations');
    }

    public function removeStation(Station $stationId)
    {
        $user = Auth::user();
        $company = $user->getCompany();
        $this->companyRepository->removeStationFromConnections($company, $stationId);

        return redirect()->route('company.showStations');
    }

    public function getAllStations()
    {
        $user = Auth::user();
        $company = $user->getCompany();
        $stations = $company->stations;

        return json_encode(StationResource::collection($stations));
    }
}
