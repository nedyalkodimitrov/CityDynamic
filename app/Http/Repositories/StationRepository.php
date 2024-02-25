<?php

namespace App\Http\Repositories;

use App\Models\Destination;
use App\Models\Station;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class StationRepository
{
    public function findAll()
    {
        return Station::all();
    }

    public function findById($id)
    {
        return Station::findOrFail($id);
    }
}
