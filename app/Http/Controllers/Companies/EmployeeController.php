<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Http\Repositories\CompanyRepository;
use App\Models\Station;
use Egulias\EmailValidator\Result\Reason\AtextAfterCFWS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    private $user;

    public function __construct(Auth $user, private CompanyRepository $companyRepository)
    {
        $this->user = $user;
    }


    public function showEmployees()
    {
        $company = $this->companyRepository->getCompanyOfUser($this->user);
        $employees = $this->companyRepository->getEmployees($company);

        return view('companies.pages.employees.employees', [
            "employees" => $employees
        ]);

    }
}
