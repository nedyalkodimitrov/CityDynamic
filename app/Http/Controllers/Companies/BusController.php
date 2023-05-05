<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\BusStation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Attributes\UsesClass;

class BusController extends Controller
{
    public function showBuses()
    {
        $user = Auth::user();
        $company = $user->getCompany;
        $buses = $company->getBuses;




        return view('companies.pages.buses.buses')->with(["buses" => $buses]);
    }

    public function showBus($id)
    {
        $bus = Bus::find($id);

        return view('companies.pages.buses.bus')->with('bus', $bus);
    }

    public function showBusCreate()
    {

        return view('companies.pages.buses.busForm');
    }

    public function showBusEdit($busId)
    {

        $bus = Bus::find($busId);
        $busStations = BusStation::all();
        return view('companies.pages.buses.busEdit')->with('bus', $bus)->with('busStations', $busStations);
    }


    public function createBus(Request $request)
    {
        $user = auth()->user();
        $bus = new Bus();
        $bus->name = $request->name;
        $bus->model = $request->model;
        $bus->seats = $request->name;
        $bus->busComapany = $request->name;
        $bus->save();

        return redirect()->route('showBuses');

    }

    public function editBus($busId, Request $request)
    {

        $bus = Bus::find($busId);
        $bus->name = $request->name;
        $bus->model = $request->model;
        $bus->seats = $request->name;
        $bus->save();

        return redirect()->route('showBuses');

    }
}
