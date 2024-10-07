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

    public function create($destination, $bus, $hour, $driver, $isRepeatable, $days, $weekDays)
    {
        DestinationSchedule::create([
            'destination_id' => $destination,
            'bus' => $bus,
            'hour' => $hour,
            'driver' => $driver,
            'is_repeatable' => $isRepeatable,
            'days' => $days,
            'week_days' => $weekDays,
        ]);
    }

    public function update($id, $bus, $hour, $driver, $isRepeatable, $days, $weekDays)
    {
        DestinationSchedule::find($id)->update([
            'bus' => $bus,
            'hour' => $hour,
            'driver' => $driver,
            'is_repeatable' => $isRepeatable,
            'days' => $days,
            'week_days' => $weekDays,
        ]);
    }
}
