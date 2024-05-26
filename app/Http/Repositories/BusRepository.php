<?php

namespace App\Http\Repositories;

use App\Models\Bus;
use App\Models\Destination;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BusRepository
{

    public function findAll()
    {
        return Bus::all();
    }

    public function findById($id)
    {
        return Bus::findOrFail($id);
    }

    public function getBusesByCompany($companyId)
    {
        return Bus::where('company', $companyId)->get();

    }

    public function create($name, $model, $seats,$seatsPerRow, $busCompany)
    {

        return Bus::create([
            'name' => $name,
            'model' => $model,
            'seats' => $seats,
            'seatsPerRow' => $seatsPerRow,
            'seatsStatus' => json_encode(array_fill(0, $seats, 0)),
            'company' => $busCompany
        ]);
    }


    public function update($busId, $name, $model, $seats)
    {
        return Bus::find($busId)->update([
            'name' => $name,
            'model' => $model,
            'seats' => $seats,
        ]);
    }
}
