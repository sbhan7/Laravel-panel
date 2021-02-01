<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//  Register & Login ثبت نام و و ورود
    Route::get('register', function (Request $request) {
       $user = \App\Models\User::create([
          'name' => 'sina',
          'email' =>  'sina@gmail.com',
          'password' => bcrypt('sinasalimi1203')
       ]);
       return $user;
    });
    Route::post('login', [LoginController::class, 'index']);
    Route::post('logout', [LoginController::class, 'logout']);


//  Vacation مرخصی
Route::get('/vacations', [\App\Http\Controllers\VacationController::class, 'index']);
Route::post('/vacation', [\App\Http\Controllers\VacationController::class, 'store']);
Route::get('/vacations/{id}', [\App\Http\Controllers\VacationController::class, 'show']);
Route::delete('/vacation/{id}', [\App\Http\Controllers\VacationController::class, 'destroy']);
