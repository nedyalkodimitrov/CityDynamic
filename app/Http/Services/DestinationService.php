<?php

namespace App\Http\Services;

use App\Http\Repositories\DestinationPointRepository;
use App\Http\Repositories\DestinationRepository;

class DestinationService
{
    private $destinationRepository;

    private $destinationPointRepository;

    public function __construct(DestinationRepository $destinationRepository, DestinationPointRepository $destinationPointRepository)
    {
        $this->destinationRepository = $destinationRepository;
        $this->destinationPointRepository = $destinationPointRepository;
    }

    public function createDestination($createData, $company): void
    {
        $destination = $this->destinationRepository->create($createData, $company);

        $this->createDestinationPoint($destination, $createData['stations']);
    }

    public function editDestination($destination, $editData): void
    {
        $destination->update([
            'name' => $editData['name'],
        ]);

        $destination->points()->delete();
        $this->createDestinationPoint($destination, $editData['stations']);
    }

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

    private function createDestinationPoint($destination, $stations)
    {
        foreach ($stations as $index => $station) {
            $this->destinationPointRepository->create($destination->id, $station, $index);
        }
    }
}
