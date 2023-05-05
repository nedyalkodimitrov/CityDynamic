<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusCompany;
use Faker\Provider\ar_EG\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function showCompanies()
    {
        return view('admin.pages.company.companies');
    }

    public function showCompany($companyId)
    {
        $stations = BusCompany::find($companyId)->getStations;
        return view('admin.pages.company.company')->with('stations', $stations);
    }

    public function showCompanyCreate()
    {
        return view('admin.pages.company.companyCreate');
    }

    public function showCompanyEdit()
    {
        return view('admin.pages.company.companyEdit');
    }

    public function createCompany(){
        $companies = new BusCompany();
        $companies->save();
    }
    public function editCompany($companyId, Request $request){
        $company = BusCompany::find($companyId);
        $company->save();
    }


}
