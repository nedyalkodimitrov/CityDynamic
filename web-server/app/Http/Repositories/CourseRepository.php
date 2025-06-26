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

    public function create($params)
    {
        return Course::create([
            'destination_id' => $params['destination'],
            'bus_id' => $params['bus'],
            'driver_id' => 3,
            'date' => $params['date'],
            'start_time' => $params['startTime'],
            //            'end_time' => $params['endTime'],
            'price' => $params['price'],
        ]);
    }

    public function update($courseId, $params)
    {
        return Course::find($courseId)->update([
            'destination' => $params['destination'],
            'bus_id' => $params['bus'],
            'driver_id' => 3,
            'date' => $params['date'],
            'start_time' => $params['startTime'],
            'end_time' => $params['endTime'],
            'price' => $params['price'],
        ]);
    }

    public function getCoursesByDestinationIds($destinationIds)
    {
        return Course::whereIn('destination_id', $destinationIds)
            ->with('destination', 'destination.startStation', 'destination.endStation')
            ->orderBy('date','desc' )
            ->orderBy('start_time', 'desc')
            ->get();
    }
}
