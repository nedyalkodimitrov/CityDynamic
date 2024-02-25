<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Http\Repositories\CompanyRepository;
use App\Http\Repositories\StationRepository;
use App\Http\Resources\StationResource;
use App\Models\Station;
use Egulias\EmailValidator\Result\Reason\AtextAfterCFWS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StationController extends Controller
{
    private $user;

    public function __construct(Auth $user, private CompanyRepository $companyRepository, private StationRepository $stationRepository)
    {
        $this->user = $user;
    }


    public function showStations()
    {
        $company = $this->companyRepository->getCompanyOfUser($this->user);
        $connectedStations = $this->companyRepository->getConnectedStations($company);

        $dissociateStations = $this->companyRepository->getDissociateStations($company);
        return view('companies.pages.stations.stations', [
                "connectedStations" => $connectedStations,
                "notConnectedStations" => $dissociateStations
            ]);

    }

    public function showStation($stationId)
    {
        $station = $this->stationRepository->findById($stationId);
        $company = $this->companyRepository->getCompanyOfUser($this->user);
        $isRequestToThisStation = $this->companyRepository->checkIfThereIsRequestToThisStation($company, $station);
        $isApproved = $this->companyRepository->checkIfStationIsConnected($company, $station);


        return view('companies.pages.stations.station')
            ->with(["station" => $station])
            ->with(["isRequestToThisStation" => $isRequestToThisStation])
            ->with(["isApproved" => $isApproved]);
    }

    public function makeStationRequest($id)
    {

        $company = $this->companyRepository->getCompanyOfUser($this->user);
        $station = $this->stationRepository->findById($id);
        $this->companyRepository->makeRequestToStation($company, $station);

        return redirect()->back();
    }

    public function declineStationRequest($stationId)
    {

        $company = $this->companyRepository->getCompanyOfUser($this->user);
        $station = $this->stationRepository->findById($stationId);
        $this->companyRepository->removeRequestToStation($company, $station);
        return redirect()->route("company.showStations");
    }

    public function unpairStation($stationId)
    {
        $company = $this->companyRepository->getCompanyOfUser($this->user);
        $station = $this->stationRepository->findById($stationId);
        $this->companyRepository->removeStationFromConnections($company, $station);
        return redirect()->route("company.showStations");
    }


    public function getAllStations()
    {

        $company = $this->companyRepository->getCompanyOfUser($this->user);
        $stations = $this->companyRepository->getConnectedStations($company);

        return json_encode(StationResource::collection($stations));
    }


}
