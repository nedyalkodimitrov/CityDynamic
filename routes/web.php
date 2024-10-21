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

Auth::routes();
Route::group([
    'prefix' => 'adminPanel',
    'middleware' => ['auth', 'roleCheck:'.\App\Http\Constants\RoleConstant::SYSTEM_ADMIN],
], function () {
    Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('homeAdmin');

    Route::get('/users', [\App\Http\Controllers\Admin\UserController::class, 'showUsers'])->name('admin.showUsers');
    Route::get('/users/create', [\App\Http\Controllers\Admin\UserController::class, 'showUserCreate'])->name('admin.showUserCreate');
    Route::post('/users/create', [\App\Http\Controllers\Admin\UserController::class, 'createUser'])->name('admin.createUser');
    Route::get('/users/{id}', [\App\Http\Controllers\Admin\UserController::class, 'showUser'])->name('admin.showUser');
    Route::post('/users/{id}', [\App\Http\Controllers\Admin\UserController::class, 'editUser'])->name('admin.editUser');

    Route::get('/companies', [\App\Http\Controllers\Admin\CompanyController::class, 'showCompanies'])->name('admin.showCompanies');
    Route::get('/companies/create', [\App\Http\Controllers\Admin\CompanyController::class, 'showCompanyCreate'])->name('admin.showCompanyCreate');
    Route::post('/companies/create', [\App\Http\Controllers\Admin\CompanyController::class, 'createCompany'])->name('admin.createCompany');
    Route::get('/companies/{id}', [\App\Http\Controllers\Admin\CompanyController::class, 'showCompany'])->name('admin.showCompany');
    Route::post('/companies/{id}', [\App\Http\Controllers\Admin\CompanyController::class, 'editCompany'])->name('admin.editCompany');

    Route::get('/stations', [\App\Http\Controllers\Admin\StationController::class, 'showStations'])->name('admin.showStations');
    Route::get('/stations/create', [\App\Http\Controllers\Admin\StationController::class, 'showStationCreate'])->name('admin.showStationCreate');
    Route::post('/stations/create', [\App\Http\Controllers\Admin\StationController::class, 'createStation'])->name('admin.createStation');
    Route::get('/stations/{id}', [\App\Http\Controllers\Admin\StationController::class, 'showStation'])->name('admin.showStation');
    Route::post('/stations/{id}', [\App\Http\Controllers\Admin\StationController::class, 'editStation'])->name('admin.editStation');
});

Route::group([
    'prefix' => 'stationPanel',
    'middleware' => ['auth', 'roleCheck:'.\App\Http\Constants\RoleConstant::STATION_ADMIN],

], function () {
    Route::get('/', [\App\Http\Controllers\Stations\HomeController::class, 'showHome'])->name('station.home');

    Route::get('/busCompanies', [\App\Http\Controllers\Stations\CompanyController::class, 'showAllCompanies'])->name('station.showCompanies');
    Route::get('/busCompanies/requests', [\App\Http\Controllers\Stations\CompanyController::class, 'showCompanyRequests'])->name('station.showCompanyRequests');
    Route::get('/busCompanies/requests/{id}', [\App\Http\Controllers\Stations\CompanyController::class, 'showCompanyRequest'])->name('station.showCompanyRequest');
    Route::post('/busCompanies/accept/{id}', [\App\Http\Controllers\Stations\CompanyController::class, 'acceptCompanyRequest'])->name('station.acceptCompanyRequest');
    Route::post('/busCompanies/decline/{id}', [\App\Http\Controllers\Stations\CompanyController::class, 'declineCompanyRequest'])->name('station.decCompanyRequest');
    Route::get('/busCompanies/{id}', [\App\Http\Controllers\Stations\CompanyController::class, 'showCompany'])->name('station.showCompany');

    Route::get('/destinations', [\App\Http\Controllers\Stations\DestinationController::class, 'showDestinations'])->name('station.showDestinations');
    Route::get('/destinations/{id}', [\App\Http\Controllers\Stations\DestinationController::class, 'showDestination'])->name('station.showDestination');

    Route::get('/busStations', [\App\Http\Controllers\Admin\StationController::class, 'showStations'])->name('showStations');
    Route::get('/busStations/create', [\App\Http\Controllers\Admin\StationController::class, 'showStationCreate'])->name('showStationCreate');
    Route::post('/busStations/create', [\App\Http\Controllers\Admin\StationController::class, 'showStation'])->name('showStation');
    Route::get('/busStations/{$id}', [\App\Http\Controllers\Admin\StationController::class, 'showStationEdit'])->name('showStationEdit');
    Route::post('/busStations/create', [\App\Http\Controllers\Admin\StationController::class, 'editStation'])->name('editStation');
});

Route::group([
    'prefix' => 'companyPanel',
    'middleware' => ['auth', 'roleCheck:'.\App\Http\Constants\RoleConstant::COMPANY_ADMIN],
], function () {
    Route::get('/', [\App\Http\Controllers\Companies\HomeController::class, 'showHome'])->name('company.home');
    Route::post('/stripe', [\App\Http\Controllers\Companies\HomeController::class, 'createStripeSession'])->name('stripe');

    Route::get('/buses', [\App\Http\Controllers\Companies\BusController::class, 'showBuses'])->name('company.showBuses');
    Route::get('/buses/create', [\App\Http\Controllers\Companies\BusController::class, 'showBusForm'])->name('company.showBusCreateForm');
    Route::post('/buses/create', [\App\Http\Controllers\Companies\BusController::class, 'createBus'])->name('company.createBus');
    Route::get('/buses/{id}', [\App\Http\Controllers\Companies\BusController::class, 'showBus'])->name('company.showBus');
    Route::post('/buses/{id}', [\App\Http\Controllers\Companies\BusController::class, 'editBus'])->name('company.editBus');

    Route::get('/employees', [\App\Http\Controllers\Companies\EmployeeController::class, 'showEmployees'])->name('company.showEmployees');

    Route::get('/busStations', [\App\Http\Controllers\Companies\StationController::class, 'showStations'])->name('company.showStations');
    Route::get('/busStations/{id}', [\App\Http\Controllers\Companies\StationController::class, 'showStation'])->name('company.showStation');
    Route::post('/busStations/makeRequest/{id}', [\App\Http\Controllers\Companies\StationController::class, 'makeStationRequest'])->name('company.makeStationRequest');
    Route::post('/busStations/decline/{id}', [\App\Http\Controllers\Companies\StationController::class, 'declineStationRequest'])->name('company.declineStationRequest');
    Route::post('/busStations/unpair/{id}', [\App\Http\Controllers\Companies\StationController::class, 'unpairStation'])->name('company.unpairStation');

    Route::get('/destinations', [\App\Http\Controllers\Companies\DestinationController::class, 'showDestinations'])->name('company.showDestinations');
    Route::get('/destinations/create', [\App\Http\Controllers\Companies\DestinationController::class, 'showDestinationCreate'])->name('company.showDestinationsForm');
    Route::post('/destinations/create', [\App\Http\Controllers\Companies\DestinationController::class, 'createDestination'])->name('company.createDestination');
    Route::get('/destinations/{id}', [\App\Http\Controllers\Companies\DestinationController::class, 'showDestination'])->name('company.showDestination');
    Route::post('/destinations/{id}/edit', [\App\Http\Controllers\Companies\DestinationController::class, 'editDestination'])->name('company.editDestination');

    Route::get('/destinations/{destinationId}/schedules', [\App\Http\Controllers\Companies\ScheduleController::class, 'showSchedules'])->name('company.showDestinationSchedules');
    Route::get('/destinations/{destinationId}/schedules/{scheduleId}', [\App\Http\Controllers\Companies\ScheduleController::class, 'showSchedule'])->name('company.showDestinationSchedule');
    Route::get('/destinations/{destinationId}/schedule', [\App\Http\Controllers\Companies\ScheduleController::class, 'showScheduleForm'])->name('company.showDestinationScheduleForm');
    Route::post('/destinations/{destinationId}/schedule', [\App\Http\Controllers\Companies\ScheduleController::class, 'createSchedule'])->name('company.createDestinationSchedule');
    Route::post('/destinations/{destinationId}/schedules/{scheduleId}', [\App\Http\Controllers\Companies\ScheduleController::class, 'editSchedule'])->name('company.editDestinationSchedule');

    Route::get('/courses', [\App\Http\Controllers\Companies\CourseController::class, 'showCourses'])->name('company.showCourses');
    Route::get('/courses/create', [\App\Http\Controllers\Companies\CourseController::class, 'showCourseForm'])->name('company.showCoursesForm');
    Route::post('/courses/create', [\App\Http\Controllers\Companies\CourseController::class, 'createCourse'])->name('company.createCourse');
    Route::get('/courses/{id}', [\App\Http\Controllers\Companies\CourseController::class, 'showCourse'])->name('company.showCourse');
    Route::post('/courses/{id}/edit', [\App\Http\Controllers\Companies\CourseController::class, 'editCourse'])->name('company.editCourse');
    Route::post('/company/connectedStation', [\App\Http\Controllers\Companies\StationController::class, 'getAllStations'])->name('company.getConnectedStations');
});

Route::group([
    'middleware' => ['auth'],
], function () {
    Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('get.logout');
    Route::get('/cart', [\App\Http\Controllers\User\ShopController::class, 'showCart'])->name('user.showCart');
    Route::post('/putInCart/{id}', [\App\Http\Controllers\User\ShopController::class, 'putInTheCart'])->name('user.putInCart');
    Route::post('/removeFromCart/{id}', [\App\Http\Controllers\User\ShopController::class, 'removeFromCart'])->name('user.removeFromCart');
    Route::post('/buy', [\App\Http\Controllers\User\ShopController::class, 'buy'])->name('user.buy');
    Route::get('/profile', [\App\Http\Controllers\User\ProfileController::class, 'showProfile'])->name('user.showProfile');
    Route::get('/purchases', [\App\Http\Controllers\User\PurchaseController::class, 'showPurchases'])->name('user.showPurchases');
    Route::get('/purchase/{id}', [\App\Http\Controllers\User\PurchaseController::class, 'showPurchase'])->name('user.showPurchase');
});

Route::get('/', [\App\Http\Controllers\User\UserController::class, 'showHome'])->name('root');
Route::get('/courses/{id}', [\App\Http\Controllers\User\UserController::class, 'showCourses'])->name('user.showCourses');
Route::get('/course/{id}', [\App\Http\Controllers\User\UserController::class, 'showCourse'])->name('user.showCourse');

Route::post('/getEndCities', [\App\Http\Controllers\User\UserController::class, 'getEndCities'])->name('user.getEndCities');
Route::get('/courses', [\App\Http\Controllers\User\UserController::class, 'searchCourses'])->name('user.shoeCourseFormView');
Route::post('/courses', [\App\Http\Controllers\User\UserController::class, 'searchCourses'])->name('user.searchCourses');
Route::get('/companies', [\App\Http\Controllers\User\UserController::class, 'showCompanies'])->name('user.showCompanies');

Route::post('/setSeatStatus/{busId}', [\App\Http\Controllers\Controller::class, 'setSeatsStatus']);
