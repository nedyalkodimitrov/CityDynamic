<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusStation extends Model
{
    use HasFactory;

    public function getCity()
    {
        return $this->belongsTo(City::class, "city", "id");
    }
    public function getCompanies()
    {
        return $this->belongsToMany(BusCompany::class, "bus_companies_bus_stations_tables", "bus_company", "bus_station");
    }
    public function getBuses()
    {
        return $this->hasMany(Bus::class, "busStation", "id");
    }

    public function getDestinations(){
        return $this->hasMany(Destination::class, "startBusStation", "id");
    }
}
