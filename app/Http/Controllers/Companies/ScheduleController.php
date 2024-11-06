<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Http\Repositories\CompanyRepository;
use App\Http\Repositories\DestinationScheduleRepository;
use App\Http\Requests\Company\Destination\CreateDestinactionScheduleRequest;
use App\Http\Requests\Company\Destination\EditDestinactionScheduleRequest;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function __construct(Auth $user, private DestinationScheduleRepository $destinationScheduleRepository, private CompanyRepository $companyRepository) {}

    public function showSchedules($destinationId)
    {
        $schedules = $this->destinationScheduleRepository->findSchedulesByDestination($destinationId);

        return view('companies.pages.schedules.schedules', [
            'schedules' => $schedules,
            'destinationId' => $destinationId,
        ]);
    }

    public function showSchedule($destinationId, $scheduleId)
    {
        $user = Auth::user();
        $company = $user->getCompany();
        $buses = $company->buses;
        $drivers = [];
        $schedule = $this->destinationScheduleRepository->findById($scheduleId);

        return view('companies.pages.schedules.schedule', [
            'schedule' => $schedule,
            'destinationId' => $destinationId,
            'buses' => $buses,
            'drivers' => $drivers,
        ]);
    }

    public function showScheduleForm($destinationId)
    {
        $user = Auth::user();
        $company = $user->getCompany();
        $buses = $company->buses;
        $drivers = [];

        return view('companies.pages.schedules.scheduleForm', [
            'buses' => $buses,
            'drivers' => $drivers,
            'destinationId' => $destinationId,
        ]);
    }

    public function createSchedule($destinationId, CreateDestinactionScheduleRequest $request, DestinationScheduleRepository $destinationScheduleRepository)
    {
        $request->validated();
        $destinationScheduleRepository->create($destinationId, $request->all());

        return redirect()->back()->with('success', 'Успешно създадено разписание');
    }

    public function editSchedule($destinationId, $scheduleId, EditDestinactionScheduleRequest $request, DestinationScheduleRepository $destinationScheduleRepository)
    {
        $request->validated();

        $destinationScheduleRepository->update($scheduleId, $request->all());

        return redirect()->back()->with('success', 'Успешно редактирано разписание');
    }

    public function deleteSchedule($destinationId, $scheduleId)
    {
        $this->destinationScheduleRepository->delete($scheduleId);
        return redirect()->route('company.showDestinationSchedules', ['destinationId'=>$destinationId])->with('success', 'Успешно изтрито разписание');
    }
}
