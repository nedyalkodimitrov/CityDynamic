<?php

namespace App\Http\Repositories;

use App\Models\User;

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
