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
    'middleware' => ['auth'],
], function () {
    Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('get.logout');
    Route::get('/cart', [\App\Http\Controllers\User\ShopController::class, 'showCart'])->name('user.showCart');
    Route::post('/addToCart/{id}/{startPointId}/{endPointId}', [\App\Http\Controllers\User\ShopController::class, 'addToCart'])->name('user.putInCart');
    Route::post('/removeFromCart/{id}', [\App\Http\Controllers\User\ShopController::class, 'removeFromCart'])->name('user.removeFromCart');
    Route::get('/profile', [\App\Http\Controllers\User\ProfileController::class, 'showProfile'])->name('user.showProfile');
    Route::get('/purchases', [\App\Http\Controllers\User\PurchaseController::class, 'showPurchases'])->name('user.showPurchases');
    Route::get('/purchase/{id}', [\App\Http\Controllers\User\PurchaseController::class, 'showPurchase'])->name('user.showPurchase');
    Route::get('/checkout', [\App\Http\Controllers\User\ShopController::class, 'showCheckout'])->name('checkout');
    Route::any('/checkout/proceed', [\App\Http\Controllers\User\ShopController::class, 'checkout'])->name('checkout.proceed');
    Route::post('/stripe', [\App\Http\Controllers\User\ShopController::class, 'createStripeSession'])->name('stripe');
});

Route::get('/', [\App\Http\Controllers\User\UserController::class, 'showHome'])->name('root');

Route::get('/course/{id}/{startCity?}/{endCity?}', [\App\Http\Controllers\User\CourseController::class, 'showCourse'])->name('user.showCourse');
Route::any('/courses', [\App\Http\Controllers\User\CourseController::class, 'showCourses'])->name('user.searchCourses');
Route::get('/companies', [\App\Http\Controllers\User\CompanyController::class, 'showAllCompanies'])->name('user.showCompanies');
Route::get('/companies/{id}', [\App\Http\Controllers\User\CompanyController::class, 'showCompany'])->name('user.showCompany');

Route::post('/setSeatStatus/{busId}', [\App\Http\Controllers\Controller::class, 'setSeatsStatus']);
