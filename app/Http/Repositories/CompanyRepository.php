<?php

namespace App\Http\Repositories;

use App\Models\Company;
use App\Models\Station;
use App\Models\User;

class CompanyRepository
{
    public function getUserCompany(User $user)
    {
        return $user->employers()->first();
    }

    public function getConnectedStationsIds(Company $company): array
    {
        return $company->stations()->pluck('stations.id')->toArray();
    }

    public function getDissociateStations(Company $company)
    {
        $connectedStationsIds = $this->getConnectedStationsIds($company);

        return Station::whereNotIn('id', $connectedStationsIds)->get();
    }

    public function checkIfThereIsRequestToThisStation(Company $company, Station $station): bool
    {
        return $company->stationConnectionRequests()->where('station', $station->id)->count() > 0;
    }

    public function checkIfStationIsConnected(Company $company, Station $station): bool
    {
        return $company->stations()->where('station', $station->id)->count() > 0;
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
        $company->stations()->detach([$station->id]);
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
