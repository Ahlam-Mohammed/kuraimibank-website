<?php

use App\Http\Controllers\dashboard\ContactInfoController;
use App\Http\Controllers\dashboard\OurPartnerController;
use App\Http\Controllers\dashboard\ServiceController;
use App\Http\Controllers\dashboard\WebInfoController;
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

//    Route::view('/about', 'dashboard.page.manage_web_info.about')->name('about');
//    Route::view('/vision', 'dashboard.page.manage_web_info.vision')->name('vision');
//    Route::view('/strategy', 'dashboard.page.manage_web_info.strategy')->name('strategy');

    //********* Services Route *********//
    Route::controller(ServiceController::class)->name('service.')->group(function (){
        Route::get('service-create', 'create')->name('create');
        Route::post('service-store', 'store')->name('store');
        Route::get('service-edit/{service}', 'edit')->name('edit');
        Route::post('service-update', 'update')->name('update');
    });

    //********* Web Info Route *********//
    Route::controller(WebInfoController::class)->name('web-info.')->group(function (){

        ###### About ######
        Route::get('about-index', 'indexAbout')->name('about.index');
        Route::post('about-update', 'updateAbout')->name('about.update');

        ###### Vision ######
        Route::get('vision-index', 'indexVision')->name('vision.index');
        Route::post('vision-update', 'updateVision')->name('vision.update');

        ###### Strategy ######
        Route::get('strategy-index', 'indexStrategy')->name('strategy.index');
        Route::post('strategy-update', 'updateStrategy')->name('strategy.update');

        ###### Policy ######
        Route::get('policy-index', 'indexPolicy')->name('policy.index');
        Route::post('policy-update', 'updatePolicy')->name('policy.update');

        ###### Principle ######
        Route::get('principle-index', 'indexPrinciple')->name('principle.index');

    });

    //********* Our Partner Route *********//
    Route::controller(OurPartnerController::class)->name('partner.')->group(function (){

        Route::get('partner-index', 'index')->name('partner.index');
        Route::post('partner-store', 'store')->name('partner.store');
        Route::post('partner-update/{id}', 'update')->name('partner.update');
        Route::get('partner-delete/{id}', 'destroy')->name('partner.delete');
        Route::get('partner-active/{id}', 'activate')->name('partner.active');

    });

    //********* Contact Info Route *********//
    Route::controller(ContactInfoController::class)->name('contact.')->group(function (){

        ###### Social ######
        Route::get('social-index', 'indexSocial')->name('social.index');
        Route::post('social-update', 'updateSocial')->name('social.update');

        ###### Contact ######
        Route::get('contact-index', 'indexContact')->name('contact.index');
        Route::post('contact-update', 'updateContact')->name('contact.update');

    });



});
