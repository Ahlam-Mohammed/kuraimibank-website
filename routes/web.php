<?php

use App\Http\Controllers\dashboard\HomeController;
use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| General Routes
|--------------------------------------------------------------------------|
*/
Route::get('change-language/{locale}', [LocaleController::class, 'switch'])->name('change-language');


/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------|
*/
Route::prefix('dashboard/')->middleware('web')->name('dashboard.')->group(function (){

    Route::controller(HomeController::class)->group(function (){

        Route::get('/', 'index')->name('index');
        Route::get('service-points', 'servicePoint')->name('service.point');
        Route::get('regions', 'region')->name('region');

    });

});
