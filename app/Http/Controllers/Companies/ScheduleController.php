<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Http\Repositories\CompanyRepository;
use App\Http\Repositories\DestinationScheduleRepository;
use App\Http\Requests\CreateDestinactionScheduleRequest;
use App\Http\Requests\EditDestinactionScheduleRequest;
use App\Models\Course;
use App\Models\Destination;
use App\Models\DestinationPoint;
use App\Models\DestinationSchedule;
use App\Models\Ticket;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{

    private $user;

    public function __construct(Auth $user, private DestinationScheduleRepository $destinationScheduleRepository, private CompanyRepository $companyRepository)
    {
        $this->user = $user;
    }

    public function showSchedules($destinationId)
    {
        $schedules = $this->destinationScheduleRepository->findSchedulesByDestination($destinationId);

        return view('companies.pages.schedules.schedules',
        [
            "schedules" => $schedules,
            "destinationId" => $destinationId
        ]);
    }

    public function showSchedule($destinationId, $scheduleId)
    {

        $schedule = $this->destinationScheduleRepository->findById($scheduleId);
        return view('companies.pages.schedules.schedule', [
            "schedule" => $schedule,
        ]);
    }

    public function showScheduleForm()
    {
        $company = $this->companyRepository->getCompanyOfUser($this->user);
        $buses = $company->getBuses;
        $drivers = $company->getEmployees;

        return view('companies.pages.schedules.scheduleForm', [
                "buses" => $buses,
                "drivers" => $drivers
            ]
        );
    }


    public function createSchedule(CreateDestinactionScheduleRequest $request, DestinationScheduleRepository $destinationScheduleRepository)
    {
        $request->validated();
        $destinationScheduleRepository->create($request->destination, $request->bus, $request->hour, $request->driver, $request->isRepeatable,
            $request->days, $request->weekDays);

        return redirect()->back();
    }

    public function editSchedule($scheduleId, EditDestinactionScheduleRequest $request, DestinationScheduleRepository $destinationScheduleRepository)
    {
        $request->validated();

        $destinationScheduleRepository->update($scheduleId, $request->bus, $request->hour, $request->driver, $request->isRepeatable,
            $request->days, $request->weekDays);

        return redirect()->back();
    }


}
