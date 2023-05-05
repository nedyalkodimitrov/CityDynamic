<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function showCourses()
    {
        return view('admin.pages.course.courses');
    }

    public function showCourse()
    {
        return view('admin.pages.course.course');
    }

    public function showCourseCreate()
    {
        return view('admin.pages.course.courseCreate');
    }

    public function showCourseEdit()
    {
        return view('admin.pages.course.courseEdit');
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
