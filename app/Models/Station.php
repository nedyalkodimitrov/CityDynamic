<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    public function city()
    {
        return $this->belongsTo(City::class, 'city', 'id');
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'companies_stations_tables', 'station', 'company');
    }

    public function companyConnectionRequests()
    {
        return $this->belongsToMany(Company::class, 'companies_stations_request', 'station', 'company');
    }

    public function destinations()
    {
        return $this->hasMany(Destination::class, 'startBusStation', 'id');
    }
}
