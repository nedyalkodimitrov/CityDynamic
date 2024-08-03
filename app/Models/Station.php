<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    public function getCity()
    {
        return $this->belongsTo(City::class, 'city', 'id');
    }

    public function getCompanies()
    {
        return $this->belongsToMany(Company::class, 'companies_stations_tables', 'station', 'company');
    }

    public function getCompanyConnectionRequests()
    {
        return $this->belongsToMany(Company::class, 'companies_stations_request', 'station', 'company');
    }
    //    public function getBuses()
    //    {
    //        return $this->hasMany(Bus::class, "busStation", "id");
    //    }

    public function getDestinations()
    {
        return $this->hasMany(Destination::class, 'startBusStation', 'id');
    }
}
