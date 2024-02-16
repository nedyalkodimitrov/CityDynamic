<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationPoint extends Model
{
    use HasFactory;

    public function getDestination()
    {
        return $this->belongsTo(Destination::class, "destination", "id");
    }

    public function getStation()
    {
        return $this->belongsTo(Station::class, "station", "id");
    }
}
