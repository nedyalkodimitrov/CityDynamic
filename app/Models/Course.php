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

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'bus', 'id');
    }

    public function driver()
    {
        return $this->belongsTo(CompanyEmployee::class, 'driver', 'id');
    }

    public function lastPoint()
    {
        return $this->belongsTo(DestinationPoint::class, 'point', 'id');
    }

    public function ticket()
    {
        return $this->hasOne(Ticket::class, 'course', 'id');
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destination', 'id');
    }
}
