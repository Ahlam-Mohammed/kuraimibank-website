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

    Route::view('/', 'dashboard.page.index')->name('index');
    Route::view('/service-points', 'dashboard.page.manage-service-points')->name('service.point');
    Route::view('/regions', 'dashboard.page.manage-regions')->name('region');
    Route::view('/categories', 'dashboard.page.manage-categories')->name('categories');


});
