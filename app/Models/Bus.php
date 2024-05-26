<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'model',
        'seats',
        'seatsPerRow',
        'seatsStatus',
        'company',
    ];
    public function getCompany()
    {
        return $this->belongsTo(Company::class, "busCompany", "id");
    }

    public function getDriver()
    {
        return $this->belongsTo(CompanyEmployee::class, "driver", "id");
    }
}
