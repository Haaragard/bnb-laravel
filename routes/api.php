<?php

use App\Http\Controllers\Api\BookableAvailabilityController;
use App\Http\Controllers\Api\BookableController;
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

Route::apiResource('/bookables', BookableController::class)
    ->only(['index', 'show']);

Route::get('bookables/{bookable}/availability', BookableAvailabilityController::class)
    ->name('bookables.availability.show');