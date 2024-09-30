<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DestinationSchedule extends Model
{
    public $fillable = [
        'destination',
        'bus',
        'hour',
        'driver',
        'isRepeatable',
        'days',
        'weekDays',
    ];

    public function destionation()
    {
        return $this->belongsTo(Destination::class, 'destination', 'id');
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'bus', 'id');

    }

    public function driver()
    {
        return $this->belongsToMany(User::class, 'company_employees', 'company', 'user');
    }
}
