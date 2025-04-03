<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Repositories\DestinationPointRepository;
use App\Http\Repositories\DestinationRepository;
use App\Http\Repositories\StationRepository;
use App\Http\Services\PriceCalculatorService;
use App\Models\City;
use App\Models\Course;
use App\Models\DestinationPoint;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function showCourses(Request $request, PriceCalculatorService $priceCalculatorService)
    {
        $startCity = City::find( $request->startCity);
        $endCity = City::find($request->endCity);

        $startStations = StationRepository::getStationIdsByCity($startCity->id);
        $endStations = StationRepository::getStationIdsByCity($endCity->id);
        $date = $request->date;
        $destinations = DestinationRepository::getDestinationWithInPoints($startStations, $endStations);

        $courses = [];
        foreach ($destinations as $destination) {
            $activeCourses = $destination->courses->where('date', '=', $date);
            $schedules = $destination->schedules->whereNull('week_days')->whereNotIn('hour', $activeCourses->pluck('start_time')->toArray());

            foreach ($activeCourses as $course) {
                $startPoint = DestinationPointRepository::getDestinatioPointByCity($startCity, $course->destination);
                $endPoint = DestinationPointRepository::getDestinatioPointByCity($endCity, $course->destination);
                $courses[] = [
                    'id' => $course->id,
                    'startCity' => $course->destination->startStation->city->name,
                    'endCity' => $course->destination->endStation->city->name,
                    'datetime' => $course->date.' '.$course->start_time,
                    'bus' => $course->bus?->name,
                    'price' => $priceCalculatorService->calculatePrice($course->price, $course->destination, $startPoint->id, $endPoint->id),
                ];
            }

            foreach ($schedules as $schedule) {
                $startPoint = DestinationPointRepository::getDestinatioPointByCity($startCity, $schedule->destination);
                $endPoint = DestinationPointRepository::getDestinatioPointByCity($endCity, $schedule->destination);

                $courses[] = [
                    'id' => $schedule->id,
                    'startCity' => $schedule->destination->startStation->city->name,
                    'endCity' => $schedule->destination->endStation->city->name,
                    'datetime' => $schedule->date.' '.$schedule->hour,
                    'bus' => $schedule->bus?->name,
                    'price' =>  $priceCalculatorService->calculatePrice($schedule->price, $schedule->destination, $startPoint->id, $endPoint->id),
                ];
            }
        }

        $cities = City::all();
        return view('user.pages.courses.courses', [
            'courses' => $courses,
            'startCity' => $request->startCity,
            'endCity' => $request->endCity,
            'cities' => $cities,
            'date' => $date,
        ]);
    }

    public function showCourse($id, ?City $startCity, ?City $endCity)
    {
        $course = Course::with('destination', 'destination.startStation', 'destination.startStation.city',
            'destination.endStation', 'destination.endStation.city')->find($id);

        $startPoint = DestinationPointRepository::getDestinatioPointByCity($startCity, $course->destination);
        $endPoint = DestinationPointRepository::getDestinatioPointByCity($endCity, $course->destination);

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
