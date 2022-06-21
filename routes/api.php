<?php

use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\CityController;
use App\Http\Controllers\api\CountryController;
use App\Http\Controllers\api\ExchangeRateController;
use App\Http\Controllers\api\NewsController;
use App\Http\Controllers\api\ServiceController;
use App\Http\Controllers\api\ServicePointController;
use App\Http\Controllers\api\SubCategoryController;
use App\Http\Controllers\api\WebInfoController;
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

Route::prefix('dashboard')->name('api.')->group(function (){

    //********* Countries API Route *********//
    Route::apiResource('countries', CountryController::class);
    Route::get('countries/activate/{id}', [CountryController::class, 'activate'])->name('countries.activate');

    //********* Cities API Route *********//
    Route::apiResource('cities', CityController::class);
    Route::get('cities/activate/{id}', [CityController::class, 'activate'])->name('cities.activate');

    //********* Service Points API Route *********//
    Route::apiResource('service/points', ServicePointController::class);
    Route::get('service/points/activate/{id}', [ServicePointController::class, 'activate'])->name('service.point.activate');

    //********* Categories API Route *********//
    Route::apiResource('categories', CategoryController::class);
    Route::get('categories/activate/{id}', [CategoryController::class, 'activate'])->name('categories.activate');

    //********* Sub Categories API Route *********//
    Route::apiResource('sub/category', SubCategoryController::class);
    Route::get('sub/category/activate/{id}', [SubCategoryController::class, 'activate'])->name('sub.category.activate');

    //********* Services API Route *********//
    Route::apiResource('services', ServiceController::class);
    Route::get('services/activate/{id}', [ServiceController::class, 'activate'])->name('services.activate');

    //********* Exchange Rate API Route *********//
    Route::apiResource('rates', ExchangeRateController::class);
    Route::get('rates/activate/{id}', [ExchangeRateController::class, 'activate'])->name('rates.activate');

    //********* News API Route *********//
    Route::apiResource('news', NewsController::class);
    Route::get('news/activate/{id}', [NewsController::class, 'activate'])->name('news.activate');

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
