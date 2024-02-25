<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function showCourses()
    {
        $user = Auth::user();
        $destinations = $user->getEmployers()->first()->getDestinations()->pluck("id");

        $courses = Course::whereIn("destination", $destinations)->get();


        return view('companies.pages.courses.courses')->with("courses", $courses);
    }

    public function showCourse($id)
    {
        $user = Auth::user();
        $destinations = $user->getEmployers()->first()->getDestinations;
        $buses = $user->getEmployers()->first()->getBuses;
        $course = Course::find($id);
        return view('companies.pages.courses.course')->with("destinations", $destinations)->with("buses", $buses)
            ->with("courseId", $id)->with("course", $course);
    }

    public function showCourseCreate()
    {
        $user = Auth::user();
        $destinations = $user->getEmployers()->first()->getDestinations;
        $buses = $user->getEmployers()->first()->getBuses;

        return view('companies.pages.courses.courseForm')->with("destinations", $destinations)->with("buses", $buses);
    }


    public function createCourse(Request $request){
        $course = new Course();
        $course->destination = $request->destination;
        $course->bus = $request->bus;
        $course->date = $request->date;
        $course->startTime = $request->startTime;
        $course->endTime = $request->endTime;
        $course->save();

        $ticket = new Ticket();
        $ticket->course = $course->id;
        $ticket->price = $request->price;
        $ticket->save();
        return redirect()->back();

    }

    public function editCourse($courseId, Request $request){
        $course = Course::find($courseId);
        $course->destination = $request->destination;
        $course->bus = $request->bus;
        $course->date = $request->date;
        $course->startTime = $request->startTime;
        $course->endTime = $request->endTime;
        $course->save();
        $ticket = $course->getTicket;
        $ticket->price = $request->price;
        $ticket->save();
        return redirect()->back();
    }


}
