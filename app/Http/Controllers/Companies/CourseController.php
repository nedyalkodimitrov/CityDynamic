<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Http\Repositories\BusRepository;
use App\Http\Repositories\CompanyRepository;
use App\Http\Repositories\CourseRepository;
use App\Http\Repositories\DestinationRepository;
use App\Http\Requests\CreateCourseRequest;
use App\Http\Requests\EditCourseRequest;
use App\Models\Course;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

    public function __construct(private CompanyRepository $companyRepository,
                                private DestinationRepository $destinationRepository,
                                private CourseRepository      $courseRepository,
                                private BusRepository         $busRepository)
    {

    }

    public function showCourses()
    {
        $user = Auth::user();
        $company = $this->companyRepository->getCompanyOfUser($user);
        $destinationsIds = $this->destinationRepository->getDestinationIdsOfCompany($company->id);

        $courses = $this->courseRepository->getCoursesByDestinationIds($destinationsIds);

        return view('companies.pages.courses.courses')->with("courses", $courses);
    }

    public function showCourse($id)
    {
        $user = Auth::user();
        $company = $this->companyRepository->getCompanyOfUser($user);
        $destinations = $this->destinationRepository->getDestinationsByCompany($company->id);
        $buses = $this->busRepository->getBusesByCompany($company->id);
        $course = $this->courseRepository->findById($id);

        return view('companies.pages.courses.course',
            [
                "destinations" => $destinations,
                "buses" => $buses,
                "courseId" => $id,
                "course" => $course
            ]);
    }

    public function showCourseCreate()
    {
        $user = Auth::user();
        $company = $this->companyRepository->getCompanyOfUser($user);
        $destinations = $this->destinationRepository->getDestinationsByCompany($company->id);
        $buses = $this->busRepository->getBusesByCompany($company->id);

        return view('companies.pages.courses.courseForm', [
            "destinations" => $destinations,
            "buses" => $buses
        ]);
    }


    public function createCourse(CreateCourseRequest $request)
    {
        $request->validated();

        $course = $this->courseRepository->create($request->destination, $request->bus, $request->date, $request->startTime, $request->endTime);


        $ticket = new Ticket();
        $ticket->course = $course->id;
        $ticket->price = $request->price;
        $ticket->save();
        return redirect()->back();

    }

    public function editCourse($courseId, EditCourseRequest $request)
    {
        $request->validated();
        $course = $this->courseRepository->update($courseId, $request->destination, $request->bus,
            $request->date, $request->startTime, $request->endTime);


        $ticket = Course::find($courseId)->getTicket;
        $ticket->price = $request->price;
        $ticket->save();
        return redirect()->back();
    }


}
