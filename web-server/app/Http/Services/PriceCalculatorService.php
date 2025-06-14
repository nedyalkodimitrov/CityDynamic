<?php

namespace App\Http\Services;

use App\Models\Destination;

class PriceCalculatorService
{
    public function calculatePrice($destinationPrice, Destination $destination, $startPointId, $endPointId)
    {
        $points = $destination->points()->select('id')->get()->pluck('id')->toArray();
        $pointsCount = count($points);
        $count = $this->countElementsBeforeAndAfter($points, $startPointId, $endPointId);
        $pricePerPoint = $destinationPrice / $pointsCount;
        $sub = $count['before'] - $count['after'];
        $distance = $sub < 0 ? $sub * -1 : $sub;
        $pointsBetween = $pointsCount - $distance;

        return $pricePerPoint * $pointsBetween;
    }

    private function countElementsBeforeAndAfter($array, $startPoint, $endPoint)
    {
        $startIndex = array_search($startPoint, $array);
        $endIndex = array_search($endPoint, $array);

        if ($startIndex === false || $endIndex === false) {
            return [
                'before' => 0,
                'after' => 0,
            ];
        }

        $beforeCount = $startIndex;
        $afterCount = count($array) - $endIndex - 1;

        return [
            'before' => $beforeCount,
            'after' => $afterCount,
        ];
    }
}
