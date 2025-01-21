<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'prefix' => 'companyPanel',
    'middleware' => ['auth', 'roleCheck:'.\App\Http\Constants\RoleConstant::COMPANY_ADMIN],
], function () {
    Route::get('/', [\App\Http\Controllers\Companies\HomeController::class, 'showHome'])->name('company.home');


    Route::get('/buses', [\App\Http\Controllers\Companies\BusController::class, 'showBuses'])->name('company.showBuses');
    Route::get('/buses/create', [\App\Http\Controllers\Companies\BusController::class, 'showBusForm'])->name('company.showBusCreateForm');
    Route::post('/buses/create', [\App\Http\Controllers\Companies\BusController::class, 'createBus'])->name('company.createBus');
    Route::get('/buses/{id}', [\App\Http\Controllers\Companies\BusController::class, 'showBus'])->name('company.showBus');
    Route::post('/buses/{id}', [\App\Http\Controllers\Companies\BusController::class, 'editBus'])->name('company.editBus');

    Route::get('/employees', [\App\Http\Controllers\Companies\EmployeeController::class, 'showEmployees'])->name('company.showEmployees');

    Route::get('/busStations', [\App\Http\Controllers\Companies\StationController::class, 'showStations'])->name('company.showStations');
    Route::get('/busStations/{id}', [\App\Http\Controllers\Companies\StationController::class, 'showStation'])->name('company.showStation');
    Route::post('/busStations/makeRequest/{id}', [\App\Http\Controllers\Companies\StationController::class, 'sendStationRequest'])->name('company.makeStationRequest');
    Route::post('/busStations/decline/{id}', [\App\Http\Controllers\Companies\StationController::class, 'rejectStationRequest'])->name('company.declineStationRequest');
    Route::post('/busStations/unpair/{id}', [\App\Http\Controllers\Companies\StationController::class, 'removeStation'])->name('company.unpairStation');

    Route::get('/destinations', [\App\Http\Controllers\Companies\DestinationController::class, 'showDestinations'])->name('company.showDestinations');
    Route::get('/destinations/form/{destinationId?}', [\App\Http\Controllers\Companies\DestinationController::class, 'showDestinationForm'])->name('company.showDestinationsForm');
    Route::post('/destinations/create', [\App\Http\Controllers\Companies\DestinationController::class, 'createDestination'])->name('company.createDestination');
    Route::get('/destinations/{id}', [\App\Http\Controllers\Companies\DestinationController::class, 'showDestination'])->name('company.showDestination');
    Route::post('/destinations/{id}/edit', [\App\Http\Controllers\Companies\DestinationController::class, 'editDestination'])->name('company.editDestination');

    Route::get('/destinations/{destinationId}/schedules', [\App\Http\Controllers\Companies\ScheduleController::class, 'showSchedules'])->name('company.showDestinationSchedules');
    Route::get('/destinations/{destinationId}/schedules/{scheduleId}', [\App\Http\Controllers\Companies\ScheduleController::class, 'showSchedule'])->name('company.showDestinationSchedule');
    Route::get('/destinations/{destinationId}/schedule', [\App\Http\Controllers\Companies\ScheduleController::class, 'showScheduleForm'])->name('company.showDestinationScheduleForm');
    Route::post('/destinations/{destinationId}/schedule', [\App\Http\Controllers\Companies\ScheduleController::class, 'createSchedule'])->name('company.createDestinationSchedule');
    Route::post('/destinations/{destinationId}/schedules/{scheduleId}', [\App\Http\Controllers\Companies\ScheduleController::class, 'editSchedule'])->name('company.editDestinationSchedule');
    Route::post('/destinations/{destinationId}/schedules/{scheduleId}/delete', [\App\Http\Controllers\Companies\ScheduleController::class, 'deleteSchedule'])->name('company.deleteDestinationSchedule');

    Route::get('/courses', [\App\Http\Controllers\Companies\CourseController::class, 'showCourses'])->name('company.showCourses');
    Route::get('/courses/create', [\App\Http\Controllers\Companies\CourseController::class, 'showCourseForm'])->name('company.showCoursesForm');
    Route::post('/courses/create', [\App\Http\Controllers\Companies\CourseController::class, 'createCourse'])->name('company.createCourse');
    Route::get('/courses/{id}', [\App\Http\Controllers\Companies\CourseController::class, 'showCourse'])->name('company.showCourse');
    Route::post('/courses/{id}/edit', [\App\Http\Controllers\Companies\CourseController::class, 'editCourse'])->name('company.editCourse');
    Route::post('/company/connectedStation', [\App\Http\Controllers\Companies\StationController::class, 'getAllStations'])->name('company.getConnectedStations');

    Route::get('/information', [\App\Http\Controllers\Companies\InformationController::class, 'showInformation'])->name('company.showInformation');
    Route::post('/information', [\App\Http\Controllers\Companies\InformationController::class, 'saveInformation'])->name('company.saveInformation');
});
