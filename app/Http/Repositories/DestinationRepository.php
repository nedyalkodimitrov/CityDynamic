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
        return Destination::where('executiveCompany', $companyId)->get();
    }
    public function getDestinationIdsOfCompany($companyId)
    {
        return Destination::where('executiveCompany', $companyId)->get()->pluck('id');
    }

    public function getTracks(Destination $destination): array
    {
        $tracks = [];
        $destinationPoints = $destination->getPoints()->orderBy("order", "ASC")->get();
        foreach ($destinationPoints as $point) {
            $station = Station::find($point->station);
            array_push($tracks, $station);
        }
        return $tracks;
    }

}
