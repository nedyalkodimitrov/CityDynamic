<?php

namespace App\Http\Repositories;

use App\Models\DestinationPoint;

class DestinationPointRepository
{
    public function create($destination, $station, $order)
    {
        $destinationPoint = new DestinationPoint;

        $destinationPoint->destination = $destination->id;
        $destinationPoint->station = $station;
        $destinationPoint->order = $order;
        $destinationPoint->duration = 0;
        $destinationPoint->distance = 0;
        $destinationPoint->price = 0;
        $destinationPoint->save();

    }
}
