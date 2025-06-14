<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact_email',
        'contact_phone',
        'contact_address',
        'profile_photo',
        'description',
        'founded_at',
        'description',
    ];

    public $timestamps = false;

    public function buses()
    {
        return $this->hasMany(Bus::class);
    }

    public function stations()
    {
        return $this->belongsToMany(Station::class, 'companies_stations', 'company_id', 'station_id');
    }

    //todo add migrations for company relations in destinations
    public function destinations()
    {
        return $this->hasMany(Destination::class);
    }

    public function connectionRequests()
    {
        return $this->belongsToMany(Station::class, 'companies_stations_connection_requests', 'company_id', 'station_id');
    }

    public function userWorkspaces()
    {
        return $this->hasMany(UserWorkspace::class, 'company_id');
    }

    public function stripeAccount(): HasOne
    {
        return $this->hasOne(CompanyStripeAccount::class);
    }
}
