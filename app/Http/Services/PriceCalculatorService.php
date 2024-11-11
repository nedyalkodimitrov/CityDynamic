<?php

namespace App\Http\Services;

class PriceCalculatorService
{
    public function calculatePrice($course, $startPointId, $endPointId)
    {
        $price = $course->price;

        $destination = $course->destination;
        $points = $destination->points()->select('id')->get()->pluck('id')->toArray();
        $pointsCount = count($points);
        $count = $this->countElementsBeforeAndAfter($points, $startPointId, $endPointId);
        $pricePerPoint = $price / $pointsCount;
        $pointsBetween = $pointsCount - $count['before'] - $count['after'];

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
