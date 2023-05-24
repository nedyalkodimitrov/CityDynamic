<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusCompany;
use App\Models\BusStation;
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
        $stationCount = BusStation::all();
        $companyCount = BusCompany::all();
        $coursesCount = Course::all();
        $usersCount = User::all();
        $soldTicketsCount = ShoppingCart::whereNotNull("order")->count();


        return view('admin.pages.index')
            ->with("destinationCount", count($destinationCount))
            ->with("stationCount", count($stationCount))
            ->with("userCount", count($usersCount))
            ->with("coursesCount", count($coursesCount))
            ->with("soldTicketsCount", $soldTicketsCount)
            ->with("companyCount", count($companyCount));
    }
}
