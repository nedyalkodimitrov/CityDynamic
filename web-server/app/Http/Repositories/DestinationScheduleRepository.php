<?php

namespace App\Http\Repositories;

use App\Models\DestinationSchedule;

class DestinationScheduleRepository
{
    public function findAll()
    {
        return DestinationSchedule::all();
    }

    public function findById($id)
    {
        return DestinationSchedule::find($id);
    }

    public function findSchedulesByDestination($destinationId)
    {
        return DestinationSchedule::where('destination_id', $destinationId)->get();
    }

    public function create($destinationId, $createData)
    {
        DestinationSchedule::create([
            'destination_id' => $destinationId,
            'bus_id' => $createData['bus'],
            'hour' => $createData['hour'],
            'driver_id' => null,
            'start_date' => $createData['startDate'],
            'end_date' => $createData['endDate'],
            'week_days' => isset($createData['days']) ? json_encode($createData['days']) : null,
            'price' => $createData['price'],
        ]);
    }

    public function update($id, $editData)
    {
        DestinationSchedule::find($id)->update([
            'bus_id' => $editData['bus'],
            'hour' => $editData['hour'],
            'driver_id' => null,
            'start_date' => $editData['startDate'],
            'end_date' => $editData['endDate'],
            'week_days' => isset($editData['days']) ? json_encode($editData['days']) : null,
            'price' => $editData['price'],
        ]);
    }

    public function delete($id)
    {
        DestinationSchedule::find($id)->delete();
    }
}
