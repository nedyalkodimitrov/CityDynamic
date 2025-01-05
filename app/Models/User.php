<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function userWorkspace()
    {
        return $this->hasOne(UserWorkspace::class, 'user_id');
    }

    public function getWorkspace(): Company|Station|null
    {
        if (!$this->userWorkspace) {
            return null;
        }

        if ($this->userWorkspace->company_id) {
            return $this->userWorkspace->company;
        }

        if ($this->userWorkspace->station_id) {
            return $this->userWorkspace->station;
        }

        return null;
    }

    public function getCompany(): Company|null
    {

        if (!$this->userWorkspace) {
            return null;
        }

        if ($this->userWorkspace->company_id) {
            return $this->userWorkspace->company;
        }
        return null;
    }

    public function getStation(): Station|null
    {
        if (!$this->userWorkspace) {
            return null;
        }

        if ($this->userWorkspace->station_id) {
            return $this->userWorkspace->station;
        }

        return null;
    }
}
