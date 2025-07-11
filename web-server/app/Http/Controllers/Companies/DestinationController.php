<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Http\Repositories\DestinationRepository;
use App\Http\Requests\Company\Destination\CreateDestinationRequest;
use App\Http\Requests\Company\Destination\EditDestinationRequest;
use App\Http\Services\DestinationService;
use App\Models\Destination;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class DestinationController extends Controller
{
    public function __construct(
        private DestinationService $destinationService,
        private DestinationRepository $destinationRepository,
    ) {}

    public function showDestinations()
    {
        $user = Auth::user();
        $company = $user->getCompany();
        $destinations = $this->destinationRepository->getDestinationsByCompany($company->id);

        return view('companies.pages.destinations.destinations', [
            'destinations' => $destinations,
        ]);
    }

    public function showDestination($destinationId)
    {
        $user = Auth::user();

        $destination = Destination::with('points', 'points.station', 'startStation', 'endStation', 'courses', 'schedules')->where('id', $destinationId)
            ->first();

        if ($destination->company_id != $user->getCompany()->id) {
            return redirect()->route('company.showDestinations');
        }

        $courses = $destination->courses->pluck('id')->toArray();
        $ticketCount = Ticket::whereIn('course_id', $courses)->count();
        $totalPrice = Ticket::whereIn('course_id', $courses)->sum('price');
        return view('companies.pages.destinations.destination', [
            'destination' => $destination,
            'ticketCount' => $ticketCount,
            'totalPrice' => $totalPrice,
        ]);
    }

    public function showDestinationForm(?Destination $destinationId)
    {
        $user = Auth::user();
        $company = $user->getCompany();
        $busStations = $company->stations;

        return view('companies.pages.destinations.destinationForm', [
            'busStations' => $busStations,
            'destination' => $destinationId,
        ]);
    }

    public function createDestination(CreateDestinationRequest $request)
    {
        $request->validated();
        $company = Auth::user()->getCompany();

        $this->destinationService->createDestination($request->only('name', 'stations'), $company);

        return redirect()->route('company.showDestinations');
    }

    public function editDestination(Destination $id, EditDestinationRequest $request)
    {
        $request->validated();
        $this->destinationService->editDestination($id, $request->only('name', 'stations'));

        return redirect()->route('company.showDestinations');
    }

    public function deleteDestination($destinationId)
    {
        $destination = Destination::with('courses')->find($destinationId);

        if ($destination->courses->count() > 0) {
            return redirect()->back()->withErrors(['destination' => 'Destination has courses']);
        }

        $destination->delete();

        return redirect()->route('showDestinations');
    }
}
