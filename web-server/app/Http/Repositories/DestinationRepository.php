<?php

namespace App\Http\Repositories;

use App\Models\Destination;

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
            'start_station_id' => reset($createData['stations']),
            'end_station_id' => $createData['stations'][count($createData['stations']) - 1],
            'company_id' => $company->id,
        ]);
    }

    public static function getDestinationWithInPoints($startStations, $endStations)
    {
        return Destination::whereHas('points', function ($query) use ($startStations) {
            $query->whereIn('station_id', $startStations);
        })->whereHas('points', function ($query) use ($endStations) {
            $query->whereIn('station_id', $endStations);
        })->with('courses', 'courses.destination', 'courses.destination.startStation', 'courses.destination.startStation.city',
            'courses.destination.endStation', 'courses.destination.endStation.city')->get();
    }
}
