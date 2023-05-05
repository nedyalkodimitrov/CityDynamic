<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Models\BusStation;
use Egulias\EmailValidator\Result\Reason\AtextAfterCFWS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StationController extends Controller
{
    public function showStations()
    {
        $user = Auth::user();
        $company = $user->getCompany;
        $connectedStations = $company->getStations;

        $connectedStationsIds = $company->getStations()->pluck('bus_stations.id')->toArray();
        $notConnectedStations = BusStation::whereNotIn('id', $connectedStationsIds)->get();
        return view('companies.pages.stations.stations')->with(["connectedStations" => $connectedStations])->with(["notConnectedStations" => $notConnectedStations]);
//        return view('admin.pages.stations.stations');
    }
    public function showStation($id)
    {
        $user = Auth::user();
        $station = BusStation::find($id);
        $company = $user->getCompany;
        $isRequestToThisStation = false;
        $isApproved = false;

        $request = $company->getRequestedStations()->where("bus_station", $station->id)->get();
        if(count($request) > 0 ){
            $isRequestToThisStation = true;
            if ($request[0]->isApproved == 1){
                $isApproved = true;
            }
        }
        return view('companies.pages.stations.station')
            ->with(["station" => $station])
            ->with(["isRequestToThisStation" => $isRequestToThisStation])
            ->with(["isApproved" => $isApproved]);
    }
    public function makeStationRequest($id)
    {
        $user = Auth::user();
        $company = $user->getCompany;
        $company->getRequestedStations()->sync([$id]);
        return redirect()->back();
    }

    public function declineStationRequest($id)
    {
        $user = Auth::user();
        $company = $user->getCompany;
        $company->getRequestedStations()->detach($id);
        return redirect()->back();
    }





}
