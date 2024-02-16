<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\Station;
use App\Models\Course;
use App\Models\ShoppingCart;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function showHome()
    {
        $user = Auth::user();
        $company = $user->getCompany;

        $destinationIds = $company->getDestinations()->pluck("id");
        $courses = Course::whereIn("destination", $destinationIds)->take(10)->orderBy("date", "ASC")->orderBy("startTime", 'ASC')->get();


        $destinationCount = $company->getDestinations()->count();
        $coursesCount = Course::whereIn("destination", $destinationIds)->count();
        //get sold tickets count
        $courseIds = Course::whereIn("destination", $destinationIds)->pluck("id");
        $ticketIds = Ticket::whereIn("course", $courseIds)->pluck("id");
        $soldTickets = ShoppingCart::whereIn("ticket", $ticketIds)->whereNotNull("order")->count();

        return view('companies.pages.index')->with("courses", $courses)
            ->with("destinationCount", $destinationCount)
            ->with("courseCount", $coursesCount)
            ->with("soldTickets", $soldTickets);
    }


}
