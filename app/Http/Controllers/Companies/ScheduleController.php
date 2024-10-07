<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Http\Repositories\CompanyRepository;
use App\Http\Repositories\DestinationScheduleRepository;
use App\Http\Requests\CreateDestinactionScheduleRequest;
use App\Http\Requests\EditDestinactionScheduleRequest;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function __construct(Auth $user, private DestinationScheduleRepository $destinationScheduleRepository, private CompanyRepository $companyRepository) {}

    public function showSchedules($destinationId)
    {
        $schedules = $this->destinationScheduleRepository->findSchedulesByDestination($destinationId);

        return view('companies.pages.schedules.schedules',
            [
                'schedules' => $schedules,
                'destinationId' => $destinationId,
            ]);
    }

    public function showSchedule($destinationId, $scheduleId)
    {
        $schedule = $this->destinationScheduleRepository->findById($scheduleId);

        return view('companies.pages.schedules.schedule', [
            'schedule' => $schedule,
        ]);
    }

    public function showScheduleForm()
    {
        $user = Auth::user();
        $company = $user->getCompany();
        $buses = $company->buses;
        $drivers = [];

        return view('companies.pages.schedules.scheduleForm', [
            'buses' => $buses,
            'drivers' => $drivers,
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
