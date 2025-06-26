<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Http\Repositories\BusRepository;
use App\Http\Repositories\CourseRepository;
use App\Http\Repositories\DestinationRepository;
use App\Http\Requests\Company\Course\CreateCourseRequest;
use App\Http\Requests\Company\Course\EditCourseRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function __construct(private DestinationRepository $destinationRepository,
                                private CourseRepository      $courseRepository,
                                private BusRepository         $busRepository)
    {
    }

    public function showCourses()
    {
        $user = Auth::user();
        $company = $user->getCompany();
        $destinationsIds = $this->destinationRepository->getDestinationIdsOfCompany($company->id);

        $courses = $this->courseRepository->getCoursesByDestinationIds($destinationsIds);

        return view('companies.pages.courses.courses', [
            'courses' => $courses,
        ]);
    }

    public function showCourse($id)
    {
        $user = Auth::user();
        $company = $user->getCompany();
        $destinations = $this->destinationRepository->getDestinationsByCompany($company->id);
        $buses = $this->busRepository->getBusesByCompany($company->id);
        $course = $this->courseRepository->findById($id);

        $isLocked = false;
        $isActive = false;
        if (Carbon::parse($course->date)->isToday() &&
            Carbon::parse($course->start_time)->isPast() && Carbon::parse($course->end_time)->isFuture()) {
            $isLocked = true;
            $isActive = true;
        } else if (Carbon::parse($course->date)->isBefore(Carbon::now()) ||
            Carbon::parse($course->date)->isToday() && Carbon::parse($course->start_time)->isPast()) {
            $isLocked = true;
        }
        return view('companies.pages.courses.course', [
            'destinations' => $destinations,
            'buses' => $buses,
            'courseId' => $id,
            'course' => $course,
            'isActive' => $isActive,
            'isLocked' => $isLocked,
        ]);
    }

    public function showCourseForm()
    {
        $user = Auth::user();
        $company = $user->getCompany();
        $destinations = $this->destinationRepository->getDestinationsByCompany($company->id);
        $buses = $this->busRepository->getBusesByCompany($company->id);

        return view('companies.pages.courses.courseForm', [
            'destinations' => $destinations,
            'buses' => $buses,
        ]);
    }

    public function createCourse(CreateCourseRequest $request)
    {
        $request->validated();
        $this->courseRepository->create($request->all());

        return redirect()->back();
    }

    public function editCourse($courseId, EditCourseRequest $request)
    {
        $request->validated();

        $this->courseRepository->update($courseId, $request->all());

        return redirect()->back();
    }
}
