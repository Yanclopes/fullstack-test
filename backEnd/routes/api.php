<?php

use App\Http\Controllers\locations\CityController;
use App\Http\Controllers\locations\StateController;
use App\Http\Controllers\weather\WeatherByIPController;
use App\Http\Controllers\weather\WeatherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/states', [StateController::class, 'getStates']);
Route::get('/cities/{state}', [CityController::class, 'getCities']);


Route::get('/weather/{city}', [WeatherController::class, 'getWeather']);
Route::get('/ip/weather', [WeatherByIPController::class, 'getWeatherByIP']);

