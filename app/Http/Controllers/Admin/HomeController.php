<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Station;
use App\Models\Course;
use App\Models\Destination;
use App\Models\ShoppingCart;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $destinationCount = Destination::all();
        $stationCount = Station::all();
        $companyCount = Company::all();
        $coursesCount = Course::all();
        $usersCount = User::all();


        return view('admin.pages.index')
            ->with("destinationCount", count($destinationCount))
            ->with("stationCount", count($stationCount))
            ->with("userCount", count($usersCount))
            ->with("coursesCount", count($coursesCount))
            ->with("companyCount", count($companyCount));
    }
}
