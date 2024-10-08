<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Http\Repositories\BusRepository;
use App\Http\Repositories\CompanyRepository;
use App\Http\Repositories\StationRepository;
use App\Http\Requests\CreateBusRequest;
use App\Http\Requests\EditBusRequest;
use Illuminate\Support\Facades\Auth;

class BusController extends Controller
{
    public function __construct(private CompanyRepository $companyRepository,
        private BusRepository $busRepository, private StationRepository $stationRepository) {}

    public function showBuses()
    {
        $user = Auth::user();
        $company = $this->companyRepository->getUserCompany($user);
        $buses = $company->buses;

        return view('companies.pages.buses.buses', [
            'buses' => $buses,
        ]);
    }

    public function showBus($id)
    {
        $bus = $this->busRepository->findById($id);

        return view('companies.pages.buses.bus', [
            'bus' => $bus,
        ]);
    }

    public function showBusCreate()
    {
        return view('companies.pages.buses.busForm');
    }

    public function showBusEdit($busId)
    {
        $bus = $this->busRepository->findById($busId);
        $busStations = $this->stationRepository->findAll();

        return view('companies.pages.buses.busEdit', [
            'bus' => $bus,
            'busStations' => $busStations,
        ]);
    }

    public function createBus(CreateBusRequest $request)
    {
        $request->validated();
        $user = Auth::user();
        $company = $this->companyRepository->getUserCompany($user);
        $this->busRepository->create($request->name, $request->model, $request->seats, $request->seatsPerRow, $company->id);

        return redirect()->route('company.showBuses');
    }

    public function editBus($busId, EditBusRequest $request)
    {
        $request->validated();
        $this->busRepository->update($busId, $request->name, $request->model, $request->seats);

        return redirect()->route('company.showBuses');
    }
}
