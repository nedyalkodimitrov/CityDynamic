<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function stations()
    {
        return $this->hasMany(Station::class);
    }
}
