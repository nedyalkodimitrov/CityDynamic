<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'start_station_id',
        'end_station_id',
        'company_id',
        'duration',
        'distance',
        'price',
    ];
    public function startStation()
    {
        return $this->belongsTo(Station::class, 'start_station_id', 'id');
    }

    public function endStation()
    {
        return $this->belongsTo(Station::class, 'end_station_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function points()
    {
        return $this->hasMany(DestinationPoint::class, 'destination_id', 'id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'destination_id', 'id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'destination_id', 'id');
    }

    public function schedules()
    {
        return $this->hasMany(DestinationSchedule::class, 'destination_id', 'id');
    }
}
