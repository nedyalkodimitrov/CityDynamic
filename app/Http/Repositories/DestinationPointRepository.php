<?php

namespace App\Http\Repositories;

use App\Models\City;
use App\Models\Destination;
use App\Models\DestinationPoint;

class DestinationPointRepository
{
    public static function getFromPointToLastPoint(DestinationPoint $point)
    {
        return DestinationPoint::where('id', '>', $point->id)
            ->with('station.city')
            ->where('destination_id', '=', $point->destination_id)
            ->get();
    }

    public static function getPointsByStations($stations)
    {
        return DestinationPoint::whereIn('station_id', $stations)->get();
    }

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

    public static function getDestinatioPointByCity(City $startCity, Destination $destination)
    {
       return DestinationPoint::join('stations', 'destination_points.station_id', '=', 'stations.id')
            ->where('stations.city_id', $startCity->id)
            ->where('destination_points.destination_id', $destination->id)
            ->select('destination_points.*')
            ->first();
    }
}
