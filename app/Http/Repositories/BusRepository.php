<?php

namespace App\Http\Repositories;

use App\Models\Bus;

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
        return Bus::where('company_id', $companyId)->get();
    }

    public function create($param)
    {
        return Bus::create([

        ]);
    }

    public function update($bus, $params)
    {
        return $bus->update([
            'name' => $name,
            'model' => $model,
            'seats' => $seats,
        ]);
    }
}
