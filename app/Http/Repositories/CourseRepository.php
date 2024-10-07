<?php

namespace App\Http\Repositories;

use App\Models\Course;

class CourseRepository
{
    public function findAll()
    {
        return Course::all();
    }

    public function findById($id)
    {
        return Course::findOrFail($id);
    }

    public function create($destination, $bus, $date, $startTime, $endTime)
    {
        return Course::create([
            'destination' => $destination,
            'bus' => $bus,
            'date' => $date,
            'start_time' => $startTime,
            'end_time' => $endTime,
        ]);
    }

    public function update($courseId, $destination, $bus, $date, $startTime, $endTime)
    {
        return Course::find($courseId)->update([
            'destination' => $destination,
            'bus' => $bus,
            'date' => $date,
            'start_time' => $startTime,
            'end_time' => $endTime,
        ]);
    }

    public function getCoursesByDestinationIds($destinationIds)
    {
        return Course::whereIn('destination_id', $destinationIds)->get();
    }
}
