<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusCompany;
use App\Models\User;
use Faker\Provider\ar_EG\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function showCompanies()
    {
        $companies = BusCompany::all();
        return view('admin.pages.companies.companies')->with('companies', $companies);
    }

    public function showCompany($companyId)
    {
        $companyAdmins = User::role('Bus Company Admin')->get();
        $users = [];
        $company = BusCompany::find($companyId);
        foreach ($companyAdmins as $busAdmin) {
            if ($busAdmin->getCompany == null){
                array_push($users, $busAdmin);
            }
        }
        return view('admin.pages.companies.company')->with('users', $users)->with('company', $company);
    }

    public function showCompanyCreate()
    {
        $companyAdmins = User::role('Bus Company Admin')->get();

        $users = [];

        foreach ($companyAdmins as $busAdmin) {
            if ($busAdmin->getCompany == null){
                array_push($users, $busAdmin);
            }
        }

        return view('admin.pages.companies.companyForm')->with('users', $users);
    }


    public function createCompany(Request  $request){
        $company = new BusCompany();
        $company->name = $request->name;
        $company->admin = $request->admin;
        $company->save();
        return redirect()->route('admin.showCompanies');
    }
    public function editCompany($companyId, Request $request){
        $company = BusCompany::find($companyId);
        $company->name = $request->name;
        $company->admin = $request->admin;
        $company->save();
        return redirect()->back();
    }


}
