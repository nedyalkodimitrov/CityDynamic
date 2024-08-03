<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

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
}
