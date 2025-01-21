<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Company;

class CompanyController extends Controller
{
    public function showAllCompanies() {
        $companies = Company::all();

        return view('user.pages.companies.companies', ['companies' => $companies]);
    }

    public function showCompany(Company $id) {
        return view('user.pages.companies.company', ['company' => $id]);
    }
}
