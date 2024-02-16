<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function getCountry()
    {
        return $this->belongsTo(Country::class, "country", "id");
    }
    public function getStations()
    {
        return $this->hasMany(Station::class, "city", "id");
    }

}
