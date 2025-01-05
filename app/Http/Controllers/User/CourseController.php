<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Repositories\DestinationRepository;
use App\Http\Repositories\StationRepository;
use App\Models\City;
use App\Models\Course;
use App\Models\DestinationPoint;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function showCourses(Request $request)
    {
        $startStations = StationRepository::getStationIdsByCity($request->startCity);
        $endStations = StationRepository::getStationIdsByCity($request->endCity);
        $date = $request->date;
        $destinations = DestinationRepository::getDestinationWithInPoints($startStations, $endStations);

        $courses = [];
        foreach ($destinations as $destination) {
            $activeCourses = $destination->courses->where('date', '=', $date);
            $schedules = $destination->schedules->whereNull('week_days')->whereNotIn('hour', $activeCourses->pluck('start_time')->toArray());

            foreach ($activeCourses as $course) {
                $courses[] = [
                    'id' => $course->id,
                    'startCity' => $course->destination->startStation->city->name,
                    'endCity' => $course->destination->endStation->city->name,
                    'datetime' => $course->date.' '.$course->start_time,
                    'bus' => $course->bus?->name,
                    'price' => $course->price,
                ];
            }

            foreach ($schedules as $schedule) {
                $courses[] = [
                    'id' => $schedule->id,
                    'startCity' => $schedule->destination->startStation->city->name,
                    'endCity' => $schedule->destination->endStation->city->name,
                    'datetime' => $schedule->date.' '.$schedule->hour,
                    'bus' => $schedule->bus?->name,
                    'price' => $schedule->price,
                ];
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

    public function showCourse($id, ?City $startCity, ?City $endCity)
    {
        $course = Course::with('destination', 'destination.startStation', 'destination.startStation.city',
            'destination.endStation', 'destination.endStation.city')->find($id);

        $startPoint = DestinationPoint::join('stations', 'destination_points.station_id', '=', 'stations.id')
            ->where('stations.city_id', $startCity->id)
            ->where('destination_points.destination_id', $course->destination_id)
            ->select('destination_points.*')
            ->first();

        $endPoint = DestinationPoint::join('stations', 'destination_points.station_id', '=', 'stations.id')
            ->where('stations.city_id', $endCity->id)
            ->where('destination_points.destination_id', $course->destination_id)
            ->select('destination_points.*')
            ->first();

        return view('user.pages.courses.course', [
            'course' => $course,
            'startCity' => $startCity,
            'endCity' => $endCity,
            'startPoint' => $startPoint,
            'endPoint' => $endPoint,
            'boughtCourseTicketNumbers' => 0,
        ]);
    }
}
