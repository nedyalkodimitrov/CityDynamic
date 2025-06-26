<?php

namespace App\Http\Services;

use App\Http\Repositories\DestinationPointRepository;
use App\Models\City;
use App\Models\Destination;

class CourseService
{
    public function __construct(private  PriceCalculatorService $priceCalculatorService)
    {
    }

    public function convertCourses($courses, City $startCity, City $endCity): array
    {
        $coursesData = [];
        foreach ($courses as $course) {
            $startPoint = DestinationPointRepository::getDestinatioPointByCity($startCity, $course->destination);
            $endPoint = DestinationPointRepository::getDestinatioPointByCity($endCity, $course->destination);
//            dd($course->price);
            $coursesData[] = [
                'id' => $course->id,
                'startCity' => $course->destination->startStation->city->name,
                'endCity' => $course->destination->endStation->city->name,
                'datetime' => $course->date.' '.$course->start_time,
                'bus' => $course->bus?->name,
                'price' => $this->priceCalculatorService->calculatePrice($course->price, $course->destination, $startPoint->id, $endPoint->id),
            ];
        }

        return $coursesData;
    }

    public function getCoursesFromSchedules($schedules, City $startCity, City $endCity)
    {
        $courses = [];
        foreach ($schedules as $schedule) {
            $startPoint = DestinationPointRepository::getDestinatioPointByCity($startCity, $schedule->destination);
            $endPoint = DestinationPointRepository::getDestinatioPointByCity($endCity, $schedule->destination);

            $courses[] = [
                'id' => $schedule->id,
                'startCity' => $schedule->destination->startStation->city->name,
                'endCity' => $schedule->destination->endStation->city->name,
                'datetime' => $schedule->date.' '.$schedule->hour,
                'bus' => $schedule->bus?->name,
                'price' =>  $this->priceCalculatorService->calculatePrice($schedule->price, $schedule->destination, $startPoint->id, $endPoint->id),
            ];
        }
        return $courses;
    }

}
