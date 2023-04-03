<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});



Route::post('login', [App\Http\Controllers\Api\AuthController::class, 'login']);
Route::post('operations/get', [App\Http\Controllers\Api\Read\OperationController::class, 'getOperations']);
Route::post('operation/reportCompletedPieces', [App\Http\Controllers\Api\Write\OperationController::class, 'reportCompletedPieces']);
Route::post('operation/start', [App\Http\Controllers\Api\Write\OperationController::class, 'startOperation']);
Route::post('operation/finish', [App\Http\Controllers\Api\Write\OperationController::class, 'finishOperation']);


