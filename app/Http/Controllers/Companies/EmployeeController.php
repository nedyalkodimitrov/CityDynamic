<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Http\Repositories\CompanyRepository;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function __construct(private CompanyRepository $companyRepository) {}

    public function showEmployees()
    {
        $user = Auth::user();
        $company = $user->getCompany();

        $employees = $this->companyRepository->getEmployees($company);

        return view('companies.pages.employees.employees', [
            'employees' => $employees,
        ]);

    }
}
