<?php

namespace App\Http\Repositories;

use App\Models\Destination;

class DestinationRepository
{
    public function findAll()
    {
        return Destination::all();
    }

    public function findById($id)
    {
        return Destination::findOrFail($id);
    }


    public function getDestinationsByCompany($companyId)
    {
        return Destination::where('company', $companyId)->get();
    }
    public function getDestinationIdsOfCompany($companyId)
    {
        return Destination::where('company', $companyId)->get()->pluck('id');
    }

}
