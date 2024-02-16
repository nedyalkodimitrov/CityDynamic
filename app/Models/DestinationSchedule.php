<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationSchedule extends Model
{
    public function getDestionation()
    {
        return $this->belongsTo(Destination::class, "destination", "id");
    }

    public function getBus(){
        return $this->belongsTo(Bus::class, "bus", "id");

    }

    public function getDriver(){
        return $this->belongsTo(CompanyEmployee::class, "driver", "id");
    }


}
