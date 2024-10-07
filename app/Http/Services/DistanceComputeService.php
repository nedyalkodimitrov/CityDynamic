<?php

namespace App\Http\Services;

class DistanceComputeService
{
    private $earthRadius = 6371; // Radius of the Earth in kilometers

    public function calculateTheDistanceBetwennTwoPoints($lat1, $lon1, $lat2, $lon2)
    {
        // Convert degrees to radians
        $lat1_rad = deg2rad($lat1);
        $lon1_rad = deg2rad($lon1);
        $lat2_rad = deg2rad($lat2);
        $lon2_rad = deg2rad($lon2);

        // Haversine formula
        $delta_lat = $lat2_rad - $lat1_rad;
        $delta_lon = $lon2_rad - $lon1_rad;

        $a = sin($delta_lat / 2) * sin($delta_lat / 2) +
             cos($lat1_rad) * cos($lat2_rad) *
             sin($delta_lon / 2) * sin($delta_lon / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        // Calculate the distance
        $distance = $this->earthRadius * $c;

        return $distance;
    }
}
