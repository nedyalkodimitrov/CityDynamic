<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Models\Station;
use Egulias\EmailValidator\Result\Reason\AtextAfterCFWS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StationController extends Controller
{
    public function showStations()
    {
        $user = Auth::user();
        $company = $user->getEmployers()->first();;
        $connectedStations = $company->getStations;

        $connectedStationsIds = $company->getStations()->pluck('bus_stations.id')->toArray();
        $notConnectedStations = Station::whereNotIn('id', $connectedStationsIds)->get();
        return view('companies.pages.stations.stations')->with(["connectedStations" => $connectedStations])->with(["notConnectedStations" => $notConnectedStations]);
//        return view('admin.pages.stations.stations');
    }

    public function showStation($id)
    {
        $user = Auth::user();
        $station = Station::find($id);
        $company = $user->getEmployers()->first();;
        $isRequestToThisStation = false;
        $isApproved = false;

        $request = $company->getRequestedStations()->where("bus_station", $station->id)->get();
        if (count($request) > 0) {
            $isRequestToThisStation = true;
        }

        if (count($company->getStations()->where("bus_station", $station->id)->get())) {
            $isApproved = true;
            $isRequestToThisStation = true;
        }
        return view('companies.pages.stations.station')
            ->with(["station" => $station])
            ->with(["isRequestToThisStation" => $isRequestToThisStation])
            ->with(["isApproved" => $isApproved]);
    }

    public function makeStationRequest($id)
    {
        $user = Auth::user();
        $company = $user->getEmployers()->first();
        $company->getRequestedStations()->attach([$id]);
        return redirect()->back();
    }

    public function declineStationRequest($id)
    {
        $user = Auth::user();
        $company = $user->getEmployers()->first();
        $company->getRequestedStations()->detach($id);
        return redirect()->route("company.showStations");
    }

    public function unpairStation($id)
    {
        $user = Auth::user();
        $company = $user->getEmployers()->first();
        $company->getStations()->detach($id);
        return redirect()->route("company.showStations");
    }


    public function getAllStations()
    {
        $user = Auth::user();

        $stations = $user->getEmployers()->first()->getStations;

        $stationsData = [];
        foreach ($stations as $station) {
            $stationData["id"] = $station->id;
            $stationData["name"] = $station->name;
            array_push($stationsData, $stationData);
        }

        return json_encode($stationsData);
    }





}
