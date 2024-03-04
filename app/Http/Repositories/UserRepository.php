<?php

namespace App\Http\Repositories;

use App\Models\Destination;
use App\Models\Station;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository
{

    public function findAll()
    {
        return User::all();

    }

    public function findById($userId)
    {
        return User::find($userId);
    }

}
