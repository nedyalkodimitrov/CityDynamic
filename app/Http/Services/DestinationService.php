<?php

namespace App\Http\Services;

class DestinationService
{
    public static function getLastBusStation($destination)
    {
        $lastDestination = null;

        while (true) {
            if ($lastDestination == null) {
                if ($destination->getNextDestination == null) {
                    return $destination->getBusStation;
                } else {
                    $lastDestination = $destination->getNextDestination;
                }
            } else {
                if ($lastDestination->getNextDestination == null) {
                    return $lastDestination->getBusStation;
                } else {
                    $lastDestination = $lastDestination->getNextDestination;
                }
            }
        }
    }

    public static function getAllPoints($destination)
    {
        $points = [];
        array_push($points, ['station' => $destination->getBusStation, 'isStartPoint' => true, 'isEndPoint' => false]);
        $nextDestination = $destination;
        while (true) {
            if ($nextDestination->getNextDestination == null) {
                $points[count($points) - 1]['isEndPoint'] = true;
                break;

            }
            $nextDestination = $nextDestination->getNextDestination;

            array_push($points, ['station' => $nextDestination->getBusStation, 'isStartPoint' => false, 'isEndPoint' => false]);
        }

        return $points;
    }

    public static function getPriceFromPointTillEnd($destination)
    {
        $price = $destination->price;
        $nextDestination = $destination;
        while (true) {
            if ($nextDestination->getNextDestination == null) {
                break;
            }

            $nextDestination = $nextDestination->getNextDestination;
            $price += $nextDestination->price;
        }

        return $price;
    }

    public static function getTimeFromPointTillEnd($destination)
    {
        $travelTime = $destination->timeTillNextPoint;
        $nextDestination = $destination;
        while (true) {
            if ($nextDestination->getNextDestination == null) {
                break;
            }
            $nextDestination = $nextDestination->getNextDestination;
            $travelTime += $nextDestination->timeTillNextPoint;
        }

        return $travelTime;
    }
}
