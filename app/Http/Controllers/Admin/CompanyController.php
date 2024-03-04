<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\CompanyRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Services\MediaService;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{


    public function __construct(private CompanyRepository $companyRepository, private UserRepository $userRepository)
    {
    }

    public function showCompanies()
    {
        $companies = $this->companyRepository->findAll();
        return view('admin.pages.companies.companies',[
            'companies' => $companies
        ]);
    }

    public function showCompany($companyId)
    {
        $users = $this->userRepository->findAll();
        $company = $this->companyRepository->findById($companyId);
        return view('admin.pages.companies.company',[
            'users' => $users,
            'company' => $company
        ]);
    }

    public function showCompanyCreate()
    {
        $users = $this->userRepository->findAll();

        return view('admin.pages.companies.companyForm',[
            'users' => $users
        ]);
    }


    public function createCompany(Request $request, MediaService $mediaService)
    {
        $imageName = $mediaService->saveImage($request->image);
        $company = Company::create([
            "name" => $request->name,
            "contactEmail" => $request->contactEmail,
            "contactPhone" => $request->contactPhone,
            "contactAddress" => $request->contactAddress,
            "profilePhoto" => $imageName,
            "description" => $request->description,
            "foundedAt" => $request->foundedAt,
            "description" => $request->description
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
