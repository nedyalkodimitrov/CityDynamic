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
        'seats_per_row',
        'seats_status',
        'company_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function driver()
    {
        return $this->belongsTo(CompanyEmployee::class, 'driver', 'id');
    }
}
