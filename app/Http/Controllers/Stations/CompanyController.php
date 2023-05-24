<?php

namespace App\Http\Controllers\Stations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function showAllCompanies()
    {
        $user = auth()->user();
        $station = $user->getStation;
        $companies = $station->getCompanies;
        return view('stations.pages.companies.companies')->with('companies', $companies);
    }

    public function showCompany($id)
    {
        $user = auth()->user();
        $station = $user->getStation;
        $company = $station->getCompanies()->where("bus_company", $id)->first();
        return view('stations.pages.companies.company')->with('company', $company);
    }


    public function showCompanyRequests()
    {
        $user = auth()->user();
        $station = $user->getStation;
        $companies = $station->getCompanyRequests()->get();

        return view('stations.pages.companies.companiesRequest')->with('companies', $companies);
    }

    public function showCompanyRequest($id)
    {

        $user = auth()->user();
        $station = $user->getStation;

        $company = $station->getCompanyRequests()->where("bus_company", $id)->first();

        return view('stations.pages.companies.companyRequest')->with("company", $company);
    }


    public function acceptCompanyRequest($id)
    {
        $user = auth()->user();
        $station = $user->getStation;
        $company = $station->getCompanyRequests()->where("bus_company", $id)->first();
        $station->getCompanyRequests()->detach($company->id);
        $station->getCompanies()->attach($company->id);

        return redirect()->route("station.showCompanyRequests");
//        return view('stations.companies.companyRequest');
    }

    public function declineCompanyRequest($id)
    {
        $user = auth()->user();
        $station = $user->getStation;
        $company = $station->getCompanyRequests()->where("bus_company", $id)->first();
        $station->getCompanyRequests()->detach($company->id);
        return redirect()->route("station.showCompanyRequests");
//        return view('stations.companies.companyRequest');
    }
}
