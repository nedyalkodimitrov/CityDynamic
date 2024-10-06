<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Http\Repositories\CompanyRepository;
use App\Http\Repositories\StationRepository;
use App\Http\Resources\StationResource;
use Illuminate\Support\Facades\Auth;

class StationController extends Controller
{
    public function __construct(private CompanyRepository $companyRepository, private StationRepository $stationRepository) {}

    public function showStations()
    {
        $user = Auth::user();
        $company = $this->companyRepository->getUserCompany($user);
        $connectedStations = $company->stations;

        $dissociateStations = $this->companyRepository->getDissociateStations($company);

        return view('companies.pages.stations.stations', [
            'connectedStations' => $connectedStations,
            'notConnectedStations' => $dissociateStations,
        ]);

    }

    public function showStation($stationId)
    {
        $user = Auth::user();
        $station = $this->stationRepository->findById($stationId);
        $company = $this->companyRepository->getUserCompany($user);
        $isRequestToThisStation = $this->companyRepository->checkIfThereIsRequestToThisStation($company, $station);
        $isApproved = $this->companyRepository->checkIfStationIsConnected($company, $station);

        return view('companies.pages.stations.station')
            ->with(['station' => $station])
            ->with(['isRequestToThisStation' => $isRequestToThisStation])
            ->with(['isApproved' => $isApproved]);
    }

    public function makeStationRequest($id)
    {
        $user = Auth::user();
        $company = $this->companyRepository->getUserCompany($user);
        $station = $this->stationRepository->findById($id);
        $this->companyRepository->makeRequestToStation($company, $station);

        return redirect()->back();
    }

    public function declineStationRequest($stationId)
    {
        $user = Auth::user();
        $company = $this->companyRepository->getUserCompany($user);
        $station = $this->stationRepository->findById($stationId);
        $this->companyRepository->removeRequestToStation($company, $station);

        return redirect()->route('company.showStations');
    }

    public function unpairStation($stationId)
    {
        $user = Auth::user();
        $company = $this->companyRepository->getUserCompany($user);
        $station = $this->stationRepository->findById($stationId);
        $this->companyRepository->removeStationFromConnections($company, $station);

        return redirect()->route('company.showStations');
    }

    public function getAllStations()
    {
        $user = Auth::user();
        $company = $this->companyRepository->getUserCompany($user);
        $stations = $company->stations;

        return json_encode(StationResource::collection($stations));
    }
}
