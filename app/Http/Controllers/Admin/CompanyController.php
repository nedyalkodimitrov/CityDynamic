<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function showCompanies()
    {
        return view('admin.pages.company.companies');
    }

    public function showCompany()
    {
        return view('admin.pages.company.company');
    }

    public function showCompanyCreate()
    {
        return view('admin.pages.company.companyCreate');
    }

    public function showCompanyEdit()
    {
        return view('admin.pages.company.companyEdit');
    }


}
