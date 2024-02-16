<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\Station;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function showBuses()
    {
        $buses = Bus::all();
        foreach ($buses as $bus) {
            $bus->busStations;

        }


        return view('admin.pages.buses.buses');
    }

    public function showBus($id)
    {
        $bus = Bus::find($id);

        return view('admin.pages.buses.bus')->with('bus', $bus);
    }

    public function showBusCreate()
    {
        return view('admin.pages.buses.busForm');
    }

    public function showBusEdit($busId)
    {

        $bus = Bus::find($busId);
        $busStations = Station::all();
        return view('admin.pages.buses.busEdit')->with('bus', $bus)->with('busStations', $busStations);
    }


    public function createBus(Request $request){

            $bus = new Bus();
            $bus->name = $request->name;
            $bus->model = $request->model;
            $bus->seats = $request->name;
            $bus->save();

            return redirect()->route('showBuses');

    }

    public function editBus($busId, Request $request){

            $bus = Bus::find($busId);
            $bus->name = $request->name;
            $bus->model = $request->model;
            $bus->seats = $request->name;
            $bus->save();

            return redirect()->route('showBuses');

    }



}
