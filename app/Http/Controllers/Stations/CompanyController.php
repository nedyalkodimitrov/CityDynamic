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

        return view('stations.pages.companies.companies', [
            'companies' => $companies,
        ]);
    }

    public function showCompany($id)
    {
        $user = \Auth::user();
        $station = $user->getStation();

        $company = $this->stationRepository->getCompanyOnStation($station, $id);

        return view('stations.pages.companies.company', [
            'company' => $company,
        ]);
    }

    public function showCompanyRequests()
    {
        $user = \Auth::user();
        $station = $user->getStation();

        return view('stations.pages.companies.companiesRequest', [
            'companies' => $station->companyRequests,
        ]);
    }

    public function showCompanyRequest($id)
    {
        $user = \Auth::user();
        $station = $user->getStation();

        $company = $this->stationRepository->getRequestFromCompany($station, $id);

        return view('stations.pages.companies.companyRequest', [
            'company' => $company,
        ]);
    }

    public function acceptCompanyRequest($id)
    {
        $user = \Auth::user();
        $station = $user->getStation();
        $this->stationRepository->acceptCompanyRequest($station, $id);

        return redirect()->route('station.showCompanyRequests');
    }

    public function declineCompanyRequest($id)
    {
        $user = \Auth::user();
        $station = $user->getStation();
        $this->stationRepository->declineCompanyRequest($station, $id);

        return redirect()->route('station.showCompanyRequests');
    }
}
