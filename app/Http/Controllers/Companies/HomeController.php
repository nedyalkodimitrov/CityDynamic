<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Http\Repositories\CompanyRepository;
use App\Http\Repositories\DestinationRepository;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct(private CompanyRepository $companyRepository, private DestinationRepository $destinationRepository)
    {
    }


    public function showHome()
    {
        $user = Auth::user();
        $company = $this->companyRepository->getCompanyOfUser($user);
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
