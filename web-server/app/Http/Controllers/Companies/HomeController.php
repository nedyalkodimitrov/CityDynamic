<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Http\Repositories\CourseRepository;
use App\Http\Repositories\DestinationRepository;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct(
        private DestinationRepository $destinationRepository,
        private CourseRepository $courseRepository
    ) {}

    public function showHome()
    {
        $user = Auth::user();
        $company = $user->getCompany();
        $destinationIds = $this->destinationRepository->getDestinationIdsOfCompany($company->id);

        $destinationCount = count($destinationIds);

        $courses = $this->courseRepository->getCoursesByDestinationIds($destinationIds);
        $soldTickets = Ticket::whereIn('course_id', $courses->pluck('id'))->count();
        return view('companies.pages.index', [
            'destinationCount' => $destinationCount,
            'courseCount' => count($courses),
            'soldTickets' => $soldTickets,
            'courses' => $courses->where('date', '>=', now()->format('Y-m-d')),
            'company' => $company,
        ]);
    }
}
