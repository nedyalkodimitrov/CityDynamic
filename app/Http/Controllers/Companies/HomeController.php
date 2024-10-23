<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Http\Repositories\CompanyRepository;
use App\Http\Repositories\CourseRepository;
use App\Http\Repositories\DestinationRepository;
use App\Http\Services\Stripe\AccountService;
use App\Http\Services\Stripe\SessionService;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct(private CompanyRepository $companyRepository, private DestinationRepository $destinationRepository, private CourseRepository $courseRepository) {}

    public function showHome()
    {
        $stripeAccount = new AccountService();
        $account = $stripeAccount->createAccount();
        $stripeLink = $stripeAccount->createAccountLink($account->id);

        $user = Auth::user();
        $company = $user->getCompany();
        $destinationIds = $this->destinationRepository->getDestinationIdsOfCompany($company->id);

        $destinationCount = count($destinationIds);

        $courses = $this->courseRepository->getCoursesByDestinationIds($destinationIds);

        return view('companies.pages.index', [
            'destinationCount' => $destinationCount,
            'courseCount' => count($courses),
            'soldTickets' => 0,
            'courses' => $courses,
        ]);
    }

    public function createStripeSession()
    {
        $stripeSession = new SessionService();
        return response()->json(['clientSecret' => $stripeSession->createSession()->client_secret]);
    }
}
