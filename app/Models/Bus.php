<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function getCompany()
    {
        return $this->belongsTo(Company::class, "busCompany", "id");
    }

    public function getDriver()
    {
        return $this->belongsTo(CompanyEmployee::class, "driver", "id");
    }
}
