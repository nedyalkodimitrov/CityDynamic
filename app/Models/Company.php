<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contactEmail',
        'contactPhone',
        'contactAddress',
        'profilePhoto',
        'description',
        'foundedAt',
        'description',
    ];

    public $timestamps = false;
    public function getBuses()
    {
        return $this->hasMany(Bus::class, "company", "id");
    }

    public function getStations()
    {
        return $this->belongsToMany(Station::class, "companies_stations_tables", "company", "station");
    }
    //todo add migrations for company relations in destinations
    public function getDestinations(){
        return $this->hasMany(Destination::class, "executiveCompany", "id");
    }

    public function getStationConnectionRequests()
    {
        return $this->belongsToMany(Station::class, "companies_stations_connection_request", "company", "station");
    }


    public function getEmployees(){
        return $this->belongsToMany(User::class, "company_employees", "company", "user");
    }


}
