<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function getBus()
    {
        return $this->belongsTo(Bus::class, "bus", "id");
    }

    public function getDestination()
    {
        return $this->belongsTo(Destination::class, "destination", "id");
    }

    public function getBusStation()
    {
        return $this->belongsTo(BusStation::class, "busStation", "id");
    }
}
