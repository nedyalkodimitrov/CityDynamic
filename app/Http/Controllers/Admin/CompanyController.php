<?php

namespace App\Http\Controllers\Admin;

use App\Http\Constants\RoleConstant;
use App\Http\Controllers\Controller;
use App\Http\Repositories\CompanyRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Services\MediaService;
use App\Models\Company;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct(private CompanyRepository $companyRepository, private UserRepository $userRepository) {}

    public function showCompanies()
    {
        $companies = $this->companyRepository->findAll();

        return view('admin.pages.companies.companies', [
            'companies' => $companies,
        ]);
    }

    public function showCompany($companyId)
    {
        $users = $this->userRepository->findAll();
        $company = $this->companyRepository->findById($companyId);

        return view('admin.pages.companies.company', [
            'users' => $users,
            'company' => $company,
        ]);
    }

    public function showCompanyCreate()
    {
        $users = $this->userRepository->getAllUsersWithOutWorkspace();

        return view('admin.pages.companies.companyForm', [
            'users' => $users,
        ]);
    }

    public function createCompany(Request $request, MediaService $mediaService)
    {
        $imageName = $mediaService->saveImage($request->image);

        $company = $this->companyRepository->create([
            'name' => $request->name,
            'contact_email' => $request->contactEmail,
            'contact_phone' => $request->contactPhone,
            'contact_address' => $request->contactAddress,
            'profile_photo' => $imageName,
            'founded_at' => $request->foundedAt,
            'description' => $request->description,
        ]);

        $user = $this->userRepository->findById($request->admin);
        $user->workspace()->create([
            'company_id' => $company->id,
        ]);

        $user->assignRole(RoleConstant::COMPANY_ADMIN);

        return redirect()->route('admin.showCompanies');
    }

    public function editCompany(Company $companyId, Request $request)
    {
        $companyId->update([
            'name' => $request->name,
        ]);

        return redirect()->back();
    }
}
