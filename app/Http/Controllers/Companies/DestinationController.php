<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Http\Repositories\DestinationRepository;
use App\Http\Requests\Company\Destination\CreateDestinationRequest;
use App\Http\Services\DestinationService;
use App\Models\Destination;
use Illuminate\Http\Request;
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
        $company = $user->getCompany();

        $destination = $this->destinationRepository->findById($destinationId);
        $tracks = $this->destinationRepository->getTracks($destination);

        $connectedStations = $company->stations;

        return view('companies.pages.destinations.destination',
            [
                'destination' => $destination,
                'tracks' => $tracks,
                'connectedStations' => $connectedStations,
            ]);
    }

    public function showDestinationCreate(?Destination $destinationId)
    {
        $user = Auth::user();
        $company = $user->getCompany();
        $busStations = $company->stations;

        return view('companies.pages.destinations.destinationForm',
            [
                'busStations' => $busStations,
                'destination' => $destinationId,
            ]);
    }

    public function createDestination(CreateDestinationRequest $request)
    {
        $company = Auth::user()->getCompany();

        $this->destinationService->createDestination($request->validated(), $company);

        return redirect()->route('company.showDestinations');
    }

    public function editDestination(Destination $destinationId, Request $request)
    {
        $this->destinationService->editDestination($destinationId, $request->all());

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
