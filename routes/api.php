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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/vacations', [\App\Http\Controllers\VacationController::class, 'index']);
Route::post('/vacation', [\App\Http\Controllers\VacationController::class, 'store']);
Route::get('/vacations/{id}', [\App\Http\Controllers\VacationController::class, 'show']);
Route::delete('/vacation/{id}', [\App\Http\Controllers\VacationController::class, 'destroy']);
