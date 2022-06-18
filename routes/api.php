<?php

use App\Http\Controllers\api\CityController;
use App\Http\Controllers\api\CountryController;
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

Route::prefix('dashboard')->name('dashboard.')->group(function (){

    Route::apiResource('countries', CountryController::class);
    Route::get('countries/activate/{id}', [CountryController::class, 'activate'])->name('countries.activate');

    Route::apiResource('cities', CityController::class);
    Route::get('cities/activate/{id}', [CityController::class, 'activate'])->name('cities.activate');

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
