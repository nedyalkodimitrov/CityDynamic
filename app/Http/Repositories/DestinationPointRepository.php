<?php

namespace App\Http\Repositories;

use App\Models\DestinationPoint;

class DestinationPointRepository
{
    public function create($destination, $station, $order)
    {
        return DestinationPoint::create([
            'destination_id' => $destination,
            'station_id' => $station,
            'order' => $order,
            'duration' => 0,
            'distance' => 0,
            'price' => 0,
        ]);
    }
}
