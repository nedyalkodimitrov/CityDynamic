<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function startBusStation()
    {
        return $this->belongsTo(Station::class, 'startBusStation', 'id');
    }

    public function endBusStation()
    {
        return $this->belongsTo(Station::class, 'endBusStation', 'id');
    }

    public function executiveCompany()
    {
        return $this->belongsTo(Company::class, 'executiveCompany', 'id');
    }

    public function points()
    {
        return $this->hasMany(DestinationPoint::class, 'destination', 'id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'destination', 'id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'destination', 'id');
    }

    public function schedules()
    {
        return $this->hasMany(DestinationSchedule::class, 'destination', 'id');
    }
}
