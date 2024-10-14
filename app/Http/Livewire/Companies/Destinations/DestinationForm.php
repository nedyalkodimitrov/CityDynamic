<?php

namespace App\Http\Livewire\Companies\Destinations;

use App\Http\Services\DestinationService;
use App\Http\Services\DistanceComputeService;
use App\Models\Station;
use Livewire\Component;

class DestinationForm extends Component
{
    public $destinationPoints = [];
    public $stations = [];
    public $totalDistance = 0;

    public function mount($stations)
    {
        $this->stations = $stations;
        $this->destinationPoints = [
            [
                'station_id' => '',
            ],
            [
                'station_id' => '',
            ],
        ];
    }

    public function render()
    {
        return view('livewire.companies.destinations.destination-form', [
            'busStations' => $this->stations
        ]);
    }

    public function addPoint()
    {
        $this->destinationPoints[] = [
            'station_id' => '',
        ];
    }

    public function removePoint($index)
    {
        unset($this->destinationPoints[$index]);
        $this->destinationPoints = array_values($this->destinationPoints); // Reindex the array
    }

    public function calculateDistance()
    {
        $stations = Station::whereIn('id', [7,9])->get();
        $this->totalDistance = 0;
        for ($i = 1; $i < count($this->destinationPoints); $i++) {
            $lat1 = explode(',', $stations[$i - 1]->location)[0];
            $lon1 = explode(',', $stations[$i - 1]->location)[1];
            $lat2 = explode(',', $stations[$i]->location)[0];
            $lon2 = explode(',', $stations[$i]->location)[1];

            $this->totalDistance += DistanceComputeService::calculateTheDistanceBetwennTwoPoints(
                $lat1,
                $lon1,
                $lat2,
                $lon2
            );
        }
    }
}
