<?php

namespace App\Http\Livewire;

use App\Http\Repositories\DestinationPointRepository;
use App\Http\Repositories\StationRepository;
use Livewire\Component;

class DestinationSearch extends Component
{
    public $cities;

    public $startCity;

    public $endCities = [];

    public $endCity;
    public $date;

    public $queryString = ['startCity', 'endCity', 'date'];

    public function render()
    {
        if ($this->startCity) {
            $this->endCities = [];
            $this->searchForEndCity();
        }

        return view('livewire.destination-search', [
            'endPoints' => $this->endCities,
            'cities' => $this->cities,
        ]);
    }

    public function searchForEndCity()
    {
        $stations = StationRepository::getStationsByCityId($this->startCity);

        $startPoints = DestinationPointRepository::getPointsByStations($stations);
        foreach ($startPoints as $point) {
            $endPoints = DestinationPointRepository::getFromPointToLastPoint($point);
            foreach ($endPoints as $endPoint) {
                if (isset($this->endCities[$endPoint->station->city->id])) {
                    continue;
                }

                $this->endCities[$endPoint->station->city->id] = $endPoint->station->city;
            }
        }
    }
}
