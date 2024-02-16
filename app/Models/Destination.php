<?php

namespace App\Models;

use App\Http\Services\DestinationService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;


class Destination extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function getStartBusStation()
    {
        return $this->belongsTo(Station::class, "startBusStation", "id");
    }
    public function getEndBusStation()
    {
        return $this->belongsTo(Station::class, "endBusStation", "id");
    }
    public function getExecutiveCompany()
    {
        return $this->belongsTo(Company::class, "executiveCompany", "id");
    }

    public function getPoints(){
        return $this->hasMany(DestinationPoint::class, "destination", "id");
    }

    public function getTickets(){
        return $this->hasMany(Ticket::class, "destination", "id");
    }
    public function getCourse(){
        return $this->hasMany(Course::class, "destination", "id");
    }
    public function getSchedules(){
        return $this->hasMany(DestinationSchedule::class, "destination", "id");
    }

}
