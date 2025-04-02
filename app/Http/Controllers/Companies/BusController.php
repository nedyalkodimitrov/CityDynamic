<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Http\Repositories\BusRepository;
use App\Http\Requests\Company\Bus\CreateBusRequest;
use App\Http\Requests\Company\Bus\EditBusRequest;
use App\Models\Bus;
use Illuminate\Support\Facades\Auth;

class BusController extends Controller
{
    public function __construct(private BusRepository $busRepository) {}

    public function showBuses()
    {
        $user = Auth::user();
        $buses = $user->getCompany()?->buses;

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

    public function showBusForm()
    {
        return view('companies.pages.buses.busForm');
    }

    public function createBus(CreateBusRequest $request)
    {
        $request->validated();
        $user = Auth::user();
        $company = $user->getCompany();

        $this->busRepository->create([
            'name' => $request->name,
            'model' => $request->model,
            'seats' => $request->seats,
            'seats_per_row' => $request->seatsPerRow,
            'seats_status' => json_encode(array_fill(0, $request->seats, 0)),
            'company' => $company->id,
        ]);

        return redirect()->route('company.showBuses');
    }

    public function editBus(Bus $busId, EditBusRequest $request)
    {
        $request->validated();

        $this->busRepository->update($busId, $request->only(['name', 'model', 'seats']));

        return redirect()->route('company.showBuses');
    }
}
