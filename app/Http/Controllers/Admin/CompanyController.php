<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\MediaService;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function showCompanies()
    {
        $companies = Company::all();
        return view('admin.pages.companies.companies')->with('companies', $companies);
    }

    public function showCompany($companyId)
    {
        $users = User::all();
        $company = Company::find($companyId);
        return view('admin.pages.companies.company')->with('users', $users)->with('company', $company);
    }

    public function showCompanyCreate()
    {

        $users = User::all();

        return view('admin.pages.companies.companyForm')->with('users', $users);
    }


    public function createCompany(Request $request, MediaService $mediaService)
    {
        $imageName = $mediaService->saveImage($request->image);
        $company = Company::create([
            "name" => $request->name, "contactEmail" => $request->contactEmail, "contactPhone" => $request->contactPhone,
            "contactAddress" => $request->contactAddress, "profilePhoto" => $imageName, "description" => $request->description,
            "foundedAt" => $request->foundedAt, "description" => $request->description
        ]);

        $company->getEmplayees->attach($request->admin);
        return redirect()->route('admin.showCompanies');
    }

    public function editCompany($companyId, Request $request)
    {
        $company = Company::find($companyId);
        $company->name = $request->name;
        $company->admin = $request->admin;
        $company->save();
        return redirect()->back();
    }


}
