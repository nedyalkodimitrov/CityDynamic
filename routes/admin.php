<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
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
