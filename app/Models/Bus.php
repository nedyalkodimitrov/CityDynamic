<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    public function getCompany()
    {
        return $this->belongsTo(BusCompany::class, "busCompany", "id");
    }

    public function getDriver()
    {
        return $this->belongsTo(User::class, "driver", "id");
    }
}
