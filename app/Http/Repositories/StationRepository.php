<?php

namespace App\Http\Repositories;

use App\Models\Station;

class StationRepository
{
    public function getDestination($station, $destinationId)
    {
        return $station->getDestinations()->where('id', $destinationId)->first();
    }

    public function acceptCompanyRequest($station, $companyId)
    {
        $company = $station->getCompanyRequests()->where('bus_company', $companyId)->first();
        $station->getCompanyRequests()->detach($company->id);
        $station->getCompanies()->attach($company->id);
    }

    public function declineCompanyRequest($station, $companyId)
    {
        $company = $station->getCompanyRequests()->where('bus_company', $companyId)->first();
        $station->getCompanyRequests()->detach($company->id);
    }

    public function getRequestFromCompany($station, $companyId)
    {
        return $station->getCompanyRequests()->where('bus_company', $companyId)->first();
    }

    public function getCompanyOnStation($station, $companyId)
    {
        return $station->getCompanies()->where('bus_company', $companyId)->first();
    }

    public function getCompaniesOnStation(Station $station)
    {
        //todo
        return [];
    }

    public function getStationOfUser()
    {
        //todo
        return new Station;
    }

    public function findAll()
    {
        return Station::all();
    }

    public function findById($id)
    {
        return Station::findOrFail($id);
    }
}
