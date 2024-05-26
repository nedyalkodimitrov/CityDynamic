<?php

namespace App\Http\Repositories;

use App\Models\Course;
use App\Models\Destination;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
            'startTime' => $startTime,
            'endTIme' => $endTime,
        ]);
    }

    public function update($courseId, $destination, $bus, $date, $startTime, $endTime)
    {
        return Course::find($courseId)->update([
            'destination' => $destination,
            'bus' => $bus,
            'date' => $date,
            'startTime' => $startTime,
            'endTIme' => $endTime,
        ]);
    }

    public function getCoursesByDestinationIds($destinationIds)
    {
        return Course::whereIn('destination', $destinationIds)->get();
    }




}
