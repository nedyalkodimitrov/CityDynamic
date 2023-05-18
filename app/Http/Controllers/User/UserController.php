<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Destination;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showHome()
    {

        $destinations = Destination::all();
        return view('user.pages.index')->with("destinations", $destinations);
    }

    public function showCourses($id)
    {

        $destination = Destination::find($id);
        $courses = $destination->getCourses;
        return view('user.pages.courses.courses')->with("courses", $courses)->with("destination", $destination);
    }

    public function showCourse($id)
    {

        $course = Course::find($id);
        return view('user.pages.courses.course')->with("course", $course);
    }


}
