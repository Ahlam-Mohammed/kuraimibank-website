<?php

use App\Http\Controllers\dashboard\HomeController;
use App\Http\Controllers\dashboard\ServiceController;
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

    //********* Pages Route *********//
    Route::view('/', 'dashboard.page.index')->name('index');
    Route::view('/manage-service-points', 'dashboard.page.manage-service-points')->name('service.point');
    Route::view('/manage-regions', 'dashboard.page.manage-regions')->name('region');
    Route::view('/manage-categories', 'dashboard.page.manage-categories')->name('categories');
    Route::view('/manage-subs-category', 'dashboard.page.manage-subs-category')->name('subs.category');
    Route::view('/manage-services', 'dashboard.page.manage-services')->name('services');
    Route::view('/manage-exchange-rates', 'dashboard.page.manage-exchange-rate')->name('rates');
    Route::view('/manage-news', 'dashboard.page.manage-news')->name('news');


    //********* Services Route *********//
    Route::controller(ServiceController::class)->name('service.')->group(function (){
        Route::get('service-create', 'create')->name('create');
        Route::post('service-store', 'store')->name('store');
    });




});
