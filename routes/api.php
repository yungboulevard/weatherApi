<?php

use App\Http\Controllers\Api\WeatherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SignInController;
use App\Http\Controllers\Api\SignUpController;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/sign-up', SignUpController::class)->name('user.register');
Route::post('/sign-in', SignInController::class)->name('user.login');

Route::group(['middleware' => ['auth:sanctum']], function() {

    Route::get('/user/get', [UserController::class, 'get']);

    Route::get('/weather/get-weather', [WeatherController::class, 'get']);

});
