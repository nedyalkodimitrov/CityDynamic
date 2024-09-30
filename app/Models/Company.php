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

    public function buses()
    {
        return $this->hasMany(Bus::class, 'company', 'id');
    }

    public function stations()
    {
        return $this->belongsToMany(Station::class, 'companies_stations_tables', 'company', 'station');
    }

    //todo add migrations for company relations in destinations
    public function destinations()
    {
        return $this->hasMany(Destination::class, 'executiveCompany', 'id');
    }

    public function stationConnectionRequests()
    {
        return $this->belongsToMany(Station::class, 'companies_stations_connection_requests', 'company', 'station');
    }

    public function employees()
    {
        return $this->belongsToMany(User::class, 'company_employees', 'company', 'user');
    }
}
