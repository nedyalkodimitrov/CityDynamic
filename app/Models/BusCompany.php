<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusCompany extends Model
{
    use HasFactory;
    public function getBuses()
    {
        return $this->hasMany(Bus::class, "busCompany", "id");
    }

    public function getStations()
    {
        return $this->belongsToMany(BusStation::class, "bus_companies_bus_stations_tables", "bus_station", "bus_company");
    }
    //todo add migrations for company relations in destinations
    public function getDestinations(){
        return $this->hasMany(Destination::class, "busCompany", "id");
    }

    public function getRequestedStations()
    {
        return $this->belongsToMany(BusStation::class, "bus_companies_bus_stations_request", "bus_station", "bus_company");
    }
}
