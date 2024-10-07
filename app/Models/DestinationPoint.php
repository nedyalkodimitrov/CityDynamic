<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationPoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination_id',
        'station_id',
        'order',
        'duration',
        'distance',
        'price',
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destination', 'id');
    }

    public function station()
    {
        return $this->belongsTo(Station::class, 'station', 'id');
    }
}
