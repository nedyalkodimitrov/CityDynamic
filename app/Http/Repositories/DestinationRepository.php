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
        return Destination::where('company_id', $companyId)
            ->with('startStation', 'endStation')
            ->get();
    }

    public function getDestinationIdsOfCompany($companyId)
    {
        return Destination::where('company_id', $companyId)->get()->pluck('id');
    }

    public function create($createData, $company)
    {
        return Destination::create([
            'name' => $createData['name'],
            'start_station_id' => $createData['stations'][0],
            'end_station_id' => $createData['stations'][count($createData['stations']) - 1],
            'company_id' => $company->id,
        ]);
    }
}
