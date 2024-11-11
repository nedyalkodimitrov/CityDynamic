<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Company;
use App\Models\Course;
use App\Models\Destination;
use App\Models\DestinationPoint;
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

    public function showCourse($id, ?City $startCity, ?City $endCity)
    {
        $course = Course::with('destination','destination.points')->find($id);

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

    public function showCompanies()
    {
        $companies = Company::all();

        return view('user.pages.companies.companies')
            ->with('companies', $companies);

    }
}
