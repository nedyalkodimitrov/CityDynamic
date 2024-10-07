<?php

namespace App\Http\Repositories;

use App\Models\Destination;
use App\Models\Station;

class DestinationRepository
{
    public function findAll()
    {
        return Destination::all();
    }

    public function findById($id)
    {
        return Destination::findOrFail($id);
    }

    public function getDestinationsByCompany($companyId)
    {
        return Destination::where('company_id', $companyId)->get();
    }

    public function getDestinationIdsOfCompany($companyId)
    {
        return Destination::where('company_id', $companyId)->get()->pluck('id');
    }

    public function getTracks(Destination $destination): array
    {
        $tracks = [];
        $destinationPoints = $destination->points()->orderBy('order', 'ASC')->get();
        foreach ($destinationPoints as $point) {
            $station = Station::find($point->station_id);
            $tracks[] = $station;
        }

        return $tracks;
    }

    public function create($name, $firstStation, $lastStation, $company)
    {
        return Destination::create([
           'name' => $name,
            'start_station_id' => $firstStation,
            'end_station_id' => $lastStation,
            'company_id' => $company->id,
        ]);
    }
}
