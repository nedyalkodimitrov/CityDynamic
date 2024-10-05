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
        'is_repeatable',
        'days',
        'week_days',
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
