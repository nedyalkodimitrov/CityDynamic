<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Http\Repositories\CompanyRepository;
use App\Http\Repositories\DestinationRepository;
use App\Models\Bus;
use App\Models\Station;
use App\Models\Course;
use App\Models\ShoppingCart;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\BaseResult;

class HomeController extends Controller
{

    private $user;

    public function __construct(Auth $user, private CompanyRepository $companyRepository, private DestinationRepository $destinationRepository)
    {
        $this->user = $user;
    }


    public function showHome()
    {

        $company = $this->companyRepository->getCompanyOfUser($this->user);
        $destinationIds = $this->destinationRepository->getDestinationIdsOfCompany($company);

        $destinationCount = count($destinationIds);
//        $coursesCount = Course::whereIn("destination", $destinationIds)->count();
        //get sold tickets count
//        $courseIds = Course::whereIn("destination", $destinationIds)->pluck("id");
//        $ticketIds = Ticket::whereIn("course", $courseIds)->pluck("id");

        return view('companies.pages.index', [
            "destinationCount" => $destinationCount,
            "courseCount" => 0,
            "soldTickets" => 0,
            "courses" => []
        ]);
    }


}
