<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function showCourses()
    {
        $user = Auth::user();
        $user->getCompany->getCourses;

        return view('companies.pages.courses.courses');
    }

    public function showCourse($id)
    {
        return view('companies.pages.courses.course');
    }

    public function showCourseCreate()
    {
        return view('companies.pages.courses.courseCreate');
    }


    public function createCourse(){
        $course = new Course();
        $course->destination = $request->destination;
        $course->bus = $request->bus;
        $course->date = $request->date;
        $course->startTime = $request->startTime;
        $course->endTime = $request->endTime;
        $course->save();
    }

    public function editCourse($courseId, Request $request){
        $course = Course::find($courseId);
        $course->destination = $request->destination;
        $course->bus = $request->bus;
        $course->date = $request->date;
        $course->startTime = $request->startTime;
        $course->endTime = $request->endTime;
        $course->save();
    }


}
