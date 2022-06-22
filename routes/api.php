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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/provinces', [App\Http\Controllers\Api\Province\ListController::class, 'index']);
Route::get('/provinces/{province}', [App\Http\Controllers\Api\Province\SingleController::class, 'show']);

Route::get('/counties', [App\Http\Controllers\Api\County\ListController::class, 'index']);
Route::get('/counties/{county}', [App\Http\Controllers\Api\County\SingleController::class, 'show']);

Route::get('/cities', [App\Http\Controllers\Api\City\ListController::class, 'index']);
Route::get('/cities/{city}', [App\Http\Controllers\Api\City\SingleController::class, 'show']);

Route::get('/ruraldistricts', [App\Http\Controllers\Api\RuralDistrict\ListController::class, 'index']);
Route::get('/ruraldistricts/{ruralDistrict}', [App\Http\Controllers\Api\RuralDistrict\SingleController::class, 'show']);