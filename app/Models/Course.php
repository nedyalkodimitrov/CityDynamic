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
    public function getDriver()
    {
        return $this->belongsTo(CompanyEmployee::class, "driver", "id");
    }

    public function getLastPoint()
    {
        return $this->belongsTo(DestinationPoint::class, "point", "id");
    }


    public function getTickets(){
        return $this->hasMany(Ticket::class, "course", "id");
    }
}
