<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Station Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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
