<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Company;
use App\Models\Course;
use App\Models\Destination;
use App\Models\DestinationPoint;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;

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


    public function showCompanies()
    {


    }
}
