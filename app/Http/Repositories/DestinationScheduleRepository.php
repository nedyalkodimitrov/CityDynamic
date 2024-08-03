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
        return DestinationSchedule::where('destination', $destinationId)->get();
    }

    public function create($desination, $bus, $hour, $driver, $isRepeatable, $days, $weekDays)
    {
        DestinationSchedule::create([
            'destination' => $desination,
            'bus' => $bus,
            'hour' => $hour,
            'driver' => $driver,
            'isRepeatable' => $isRepeatable,
            'days' => $days,
            'weekDays' => $weekDays,
        ]);
    }

    public function update($id, $bus, $hour, $driver, $isRepeatable, $days, $weekDays)
    {
        DestinationSchedule::find($id)->update([
            'bus' => $bus,
            'hour' => $hour,
            'driver' => $driver,
            'isRepeatable' => $isRepeatable,
            'days' => $days,
            'weekDays' => $weekDays,
        ]);

    }
}
