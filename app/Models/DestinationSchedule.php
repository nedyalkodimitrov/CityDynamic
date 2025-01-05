<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DestinationSchedule extends Model
{
    public $fillable = [
        'destination_id',
        'bus_id',
        'hour',
        'driver_id',
        'week_days',
        'price',
        'start_date',
        'end_date',
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destination_id', 'id');
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'bus_id', 'id');
    }

    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }
}
