<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Destination;
use App\Models\Station;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function showCourses(Request $request)
    {
        $startStations = Station::where('city_id', $request->startCity)->select('id')->get()->toArray();
        $endStations = Station::where('city_id', $request->endCity)->select('id')->get()->toArray();

        $destinations = Destination::whereHas('points', function ($query) use ($startStations) {
            $query->whereIn('station_id', $startStations);
        })->whereHas('points', function ($query) use ($endStations) {
            $query->whereIn('station_id', $endStations);
        })->get();


        $courses = [];
        foreach ($destinations as $destination) {
            $destinationCourses = $destination->courses;

            foreach ($destinationCourses as $course) {

                array_push($courses, $course);
            }
        }

        $cities = City::all();

        return view('user.pages.courses.courses', [
            'courses' => $courses,
            'startCity' => $request->startCity,
            'endCity' => $request->endCity,
            'cities' => $cities,
            'date' => null,
        ]);
    }
}
