<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function getStartBusStation()
    {
        return $this->belongsTo(Station::class, 'startBusStation', 'id');
    }

    public function getEndBusStation()
    {
        return $this->belongsTo(Station::class, 'endBusStation', 'id');
    }

    public function getExecutiveCompany()
    {
        return $this->belongsTo(Company::class, 'executiveCompany', 'id');
    }

    public function getPoints()
    {
        return $this->hasMany(DestinationPoint::class, 'destination', 'id');
    }

    public function getTickets()
    {
        return $this->hasMany(Ticket::class, 'destination', 'id');
    }

    public function getCourses()
    {
        return $this->hasMany(Course::class, 'destination', 'id');
    }

    public function getSchedules()
    {
        return $this->hasMany(DestinationSchedule::class, 'destination', 'id');
    }
}
