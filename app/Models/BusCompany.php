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
        return $this->belongsToMany(BusStation::class, "bus_companies_bus_stations_tables", "busStation", "id");
    }
}
