<?php

namespace App\Http\Repositories;

use App\Models\Station;

class StationRepository
{
    public function getDestination($station, $destinationId)
    {
        return $station->getDestinations()->where('id', $destinationId)->first();
    }

    public static function getStationsByCityId($cityId)
    {
        return Station::where('city_id', $cityId)
            ->select('id')
            ->get()
            ->toArray();
    }

    public function acceptCompanyRequest($station, $companyId)
    {
        $company = $station->companyConnectionRequests()->where('company_id', $companyId)->first();
        $station->companyConnectionRequests()->detach($company->id);
        $station->companies()->attach($company->id);
    }

    public function declineCompanyRequest($station, $companyId)
    {
        $company = $station->companyConnectionRequests()->where('company_id', $companyId)->first();
        $station->companyConnectionRequests()->detach($company->id);
    }

    public function getRequestFromCompany($station, $companyId)
    {
        return $station->companyConnectionRequests()->where('company_id', $companyId)->first();
    }

    public function getCompanyOnStation($station, $companyId)
    {
        return $station->companies()->where('company_id', $companyId)->first();
    }

    public function getCompaniesOnStation(Station $station)
    {
        return $station->companies()->get();
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

    public static function getStationIdsByCity($cityId)
    {
        return Station::where('city_id', $cityId)->select('id')->get()->toArray();
    }
}
