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
        $station->companies()->attach($company->id);
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
        return $station->companies()->where('bus_company', $companyId)->first();
    }

    public function getCompaniesOnStation(Station $station)
    {
        //todo
        return [];
    }

    public function findAll()
    {
        return Station::all();
    }

    public function findById($id)
    {
        return Station::findOrFail($id);
    }

    public function create($params)
    {
        return Station::create($params);
    }

    public function update($station, $params)
    {
        $station->update($params);
    }
}
