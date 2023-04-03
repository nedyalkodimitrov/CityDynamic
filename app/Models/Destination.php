<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    public function getStartBusStation()
    {
        return $this->belongsTo(BusStation::class, "startBusStation", "id");
    }
    public function getEndBusStation()
    {
        return $this->belongsTo(BusStation::class, "endBusStation", "id");
    }
}
