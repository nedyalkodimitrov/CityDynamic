<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Course;
use App\Models\Destination;
use App\Models\Station;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $destinationCount = Destination::count();
        $stationCount = Station::count();
        $companyCount = Company::count();
        $coursesCount = Course::count();
        $usersCount = User::count();

        return view('admin.pages.index', [
            'destinationCount' => $destinationCount,
            'stationCount' => $stationCount,
            'companyCount' => $companyCount,
            'coursesCount' => $coursesCount,
            'userCount' => $usersCount,
        ]);
    }
}
