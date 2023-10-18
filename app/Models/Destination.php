<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;


class Destination extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function getBusStation()
    {
        return $this->belongsTo(BusStation::class, "busStation", "id");
    }

    //todo add migrations for destination relations in courses
    public function getCourses()
    {
        return $this->hasMany(Course::class, "destination", "id");
    }

    public function getCompany()
    {
        return $this->belongsTo(BusCompany::class, "busCompany");
    }

    public function getNextDestination()
    {
        return $this->belongsTo(Destination::class, "nextDestination", "id");
    }

    public function getPrevDestination()
    {
        return $this->belongsTo(Destination::class, "prevDestination", "id");
    }

    public function getLastBusStation()
    {
        $lastDestination = null;

        while (true) {
            if ($lastDestination == null) {
                if ($this->getNextDestination == null) {
                    return $this->getBusStation();
                }else{
                    $lastDestination = $this->getNextDestination;
                }
            } else {
                if ($lastDestination->getNextDestination == null) {
                    return  $lastDestination->getBusStation();
                }else{
                    $lastDestination = $lastDestination->getNextDestination;
                }
            }
        }

    }

    public function scopeGetAllPoints(){
        $points = [];
        $destination = $this->getBusStation();
        array_push($points, $destination);
        while(true){
            if ($destination->getNextDestination == null) {
                break;
            }
            $destination = $destination->getNextDestination;
            array_push($points, $destination);
        }
        return $points;
    }

}
