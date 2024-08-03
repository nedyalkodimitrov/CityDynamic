<?php

namespace App\Http\Controllers\Stations;

use App\Http\Controllers\Controller;
use App\Http\Repositories\StationRepository;

class CompanyController extends Controller
{
    public function __construct(private StationRepository $stationRepository) {}

    public function showAllCompanies()
    {
        $user = auth()->user();
        $station = $this->stationRepository->getStationOfUser();
        $companies = $this->stationRepository->getCompaniesOnStation($station);

        return view('stations.pages.companies.companies')->with('companies', $companies);
    }

    public function showCompany($id)
    {
        $user = auth()->user();
        $station = $this->stationRepository->getStationOfUser();
        $company = $this->stationRepository->getCompanyOnStation($station, $id);

        return view('stations.pages.companies.company')->with('company', $company);
    }

    public function showCompanyRequests()
    {
        $user = auth()->user();
        $station = $this->stationRepository->getStationOfUser();

        return view('stations.pages.companies.companiesRequest')->with('companies', $station->getCompanyRequests);
    }

    public function showCompanyRequest($id)
    {

        $user = auth()->user();
        $station = $user->getStation;

        $company = $this->stationRepository->getRequestFromCompany($station, $id);

        return view('stations.pages.companies.companyRequest')->with('company', $company);
    }

    public function acceptCompanyRequest($id)
    {
        $user = auth()->user();
        $station = $this->stationRepository->getStationOfUser();
        $this->stationRepository->acceptCompanyRequest($station, $id);

        return redirect()->route('station.showCompanyRequests');
    }

    public function declineCompanyRequest($id)
    {
        $user = auth()->user();
        $station = $this->stationRepository->getStationOfUser();
        $this->stationRepository->declineCompanyRequest($station, $id);

        return redirect()->route('station.showCompanyRequests');
        //        return view('stations.companies.companyRequest');
    }
}
