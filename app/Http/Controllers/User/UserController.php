<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Company;
use App\Models\Destination;

class UserController extends Controller
{
    public function showHome()
    {
        \Log::info('Showing home page');
        $cities = City::all();

        $companies = Company::all();
        $destinations = Destination::all();

        return view('user.pages.index', [
            'cities' => $cities,
            'companies' => $companies,
            'destinations' => $destinations,
        ]);
    }

    public function showCompanies() {}
}
