<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Models\Station;
use Egulias\EmailValidator\Result\Reason\AtextAfterCFWS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function showEmployees()
    {
        $user = Auth::user();
        $company = $user->getEmployers()->first();;
        $employees = $company->getEmployees;

        return view('companies.pages.employees.employees')->with(["employees" => $employees]);

    }
}
