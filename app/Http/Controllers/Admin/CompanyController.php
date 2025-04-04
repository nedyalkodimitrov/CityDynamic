<?php

namespace App\Http\Controllers\Admin;

use App\Http\Constants\RoleConstant;
use App\Http\Controllers\Controller;
use App\Http\Repositories\CompanyRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Requests\Admin\Company\CreateCompanyRequest;
use App\Http\Requests\Admin\Company\EditCompanyRequest;
use App\Http\Services\MediaService;
use App\Models\Company;

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

    public function createCompany(CreateCompanyRequest $request)
    {
        $imageName = MediaService::saveImage($request->image);

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
        $this->userRepository->addWorkCompanyToUser($user, $company);

        $user->assignRole(RoleConstant::COMPANY_ADMIN);

        return redirect()->route('admin.showCompanies');
    }

    public function editCompany(Company $companyId, EditCompanyRequest $request)
    {
        $request->validated();

        $companyId->update([
            'name' => $request->name,
        ]);

        return redirect()->back();
    }
}
