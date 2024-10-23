<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Company;
use App\Models\Course;
use App\Models\Destination;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showHome()
    {
        $cities = City::all();

        $companies = Company::all();
        $destinations = Destination::all();

        return view('user.pages.index', [
            'cities' => $cities,
            'companies' => $companies,
            'destinations' => $destinations,
        ]);
    }

    public function getEndCities(Request $request)
    {
        try {
            $startCity = City::find($request->startCity);

            $endCities = [];
            foreach ($startCity->getStations as $station) {
                foreach ($station->getDestinations as $destination) {
                    $city = $destination->endBusStation->getCity;
                    array_push($endCities, $city);
                }
            }

            return $endCities;

        } catch (\Throwable $throwable) {
            return $throwable->getMessage();
        }
    }

    public function searchCourses(Request $request)
    {
        $destinations = Destination::join('stations as startBus', 'startBus.id', '=', 'startBusStation')
            ->join('stations as endBus', 'endBusStation', '=', 'endBus.id')
            ->where('startBus.city', $request->startCity)
            ->where('endBus.city', $request->endCity)
            ->select('destinations.*')
            ->get();

        $destination = Destination::join('stations as startBus', 'startBus.id', '=', 'startBusStation')
            ->join('stations as endBus', 'endBusStation', '=', 'endBus.id')
            ->where('startBus.city', $request->startCity)
            ->where('endBus.city', $request->endCity)
            ->select('destinations.*')
            ->first();

        $courses = [];
        foreach ($destinations as $destination) {
            $destinationCourses = $destination->getCourses;

            foreach ($destinationCourses as $course) {

                array_push($courses, $course);
            }
        }

        $cities = City::all();

        return view('user.pages.courses.courses', [
            'courses' => $courses,
            'destination' => $destination,
            'startCity' => $request->startCity,
            'endCity' => $request->endCity,
            'cities' => $cities,
            'date' => null,
        ]);
    }

    public function showCourses($id)
    {
        $destination = Destination::find($id);

        $courses = $destination->courses;
        $cities = City::all();

        return view('user.pages.courses.courses', [
            'courses' => $courses,
            'destination' => $destination,
            'startCity' => $destination->startStation->city->name,
            'endCity' => $destination->endStation->city->name,
            'cities' => $cities,
            'date' => null,
        ]);
    }

    public function showCourse($id)
    {
        $course = Course::find($id);
        //        $boughtCourseTicketNumbers = ShoppingCart::where('ticket', $course->getTicket->id)->count();

        return view('user.pages.courses.course', [
            'course' => $course,
            'boughtCourseTicketNumbers' => 0,
        ]);
    }

    public function showCompanies()
    {
        $companies = Company::all();

        return view('user.pages.companies.companies')
            ->with('companies', $companies);

    }
}
