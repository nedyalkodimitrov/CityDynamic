<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination',
        'bus',
        'date',
        'startTime',
        'endTime',

    ];

    public function getBus()
    {
        return $this->belongsTo(Bus::class, 'bus', 'id');
    }

    public function getDriver()
    {
        return $this->belongsTo(CompanyEmployee::class, 'driver', 'id');
    }

    public function getLastPoint()
    {
        return $this->belongsTo(DestinationPoint::class, 'point', 'id');
    }

    public function getTicket()
    {
        return $this->hasOne(Ticket::class, 'course', 'id');
    }

    public function getDestination()
    {
        return $this->belongsTo(Destination::class, 'destination', 'id');
    }
}
