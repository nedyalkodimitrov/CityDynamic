<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city_id',
        'profile_photo',
        'contact_email',
        'contact_phone',
        'contact_address',
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'companies_stations', 'station_id', 'company_id');
    }

    public function companyConnectionRequests()
    {
        return $this->belongsToMany(Company::class, 'companies_stations_request', 'station_id', 'company_id');
    }

    public function destinations()
    {
        return $this->hasMany(Destination::class, 'startBusStation', 'id');
    }
}
