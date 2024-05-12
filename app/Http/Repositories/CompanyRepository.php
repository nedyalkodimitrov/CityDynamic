<?php

namespace App\Http\Repositories;

use App\Models\Bus;
use App\Models\Company;
use App\Models\Destination;
use App\Models\Station;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CompanyRepository
{
    public function getCompanyOfUser( $user)
    {
        return $user->getEmployers()->first();
    }

    public function getEmployees(Company $company)
    {
        return $company->getEmployees;
    }

    public function getCompanyByBys(Bus $bus)
    {
        return $bus->busStations;
    }

    public function getConnectedStations(Company $company)
    {
        return $company->getStations;
    }

    public function getConnectedStationsIds(Company $company): array
    {
        return $company->getStations()->pluck('stations.id')->toArray();
    }

    public function getDissociateStations(Company $company)
    {
        $connectedStationsIds = $this->getConnectedStationsIds($company);
        return Station::whereNotIn('id', $connectedStationsIds)->get();
    }

    public function checkIfThereIsRequestToThisStation(Company $company, Station $station): bool
    {
        return count($company->getRequestedStations()->where('bus_station', $station->id)->get()) > 0;
    }

    public function checkIfStationIsConnected(Company $company, Station $station): bool
    {
        return count($company->getStations()->where('bus_station', $station->id)->get()) > 0;
    }

    public function makeRequestToStation(Company $company, Station $station)
    {
        $company->getRequestedStations()->attach([$station->id]);
    }

    public function removeRequestToStation(Company $company, Station $station)
    {
        $company->getRequestedStations()->detach([$station->id]);
    }

    public function removeStationFromConnections(Company $company, Station $station)
    {
        $company->getStations()->detach([$station->id]);
    }

    public function getAllConnectedStations(Company $company)
    {
        return $company->getStations;
    }

    public function findAll()
    {
        return Company::all();
    }

    public function findById($id)
    {
        return Company::find($id);
    }
}
