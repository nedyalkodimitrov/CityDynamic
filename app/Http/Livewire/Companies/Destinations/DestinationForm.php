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
    public $destination = null;

    public function mount($stations, $destination)
    {
        $this->stations = $stations;
        $this->destination = $destination;
        if ($destination) {
            $this->destinationPoints = $destination->points->toArray();
        } else {
            $this->destinationPoints = [
                [
                    'station_id' => '',
                ],
                [
                    'station_id' => '',
                ],
            ];
        }
    }

    public function render()
    {
        return view('livewire.companies.destinations.destination-form', [
            'busStations' => $this->stations,
            'destination' => $this->destination,
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
}
