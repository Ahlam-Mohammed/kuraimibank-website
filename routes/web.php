<?php

use App\Http\Controllers\dashboard\ContactInfoController;
use App\Http\Controllers\dashboard\OurPartnerController;
use App\Http\Controllers\dashboard\ReportController;
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
Route::prefix('dashboard/')->middleware('web','auth')->name('dashboard.')->group(function (){

    //********* Pages Route *********//
    Route::view('/', 'dashboard.page.index')->name('index');
    Route::view('/manage-service-points', 'dashboard.page.manage-service-points')->name('service.point');
    Route::view('/manage-regions', 'dashboard.page.manage-regions')->name('region');
    Route::view('/manage-categories', 'dashboard.page.manage-categories')->name('categories');
    Route::view('/manage-subs-category', 'dashboard.page.manage-subs-category')->name('subs.category');
//    Route::view('/manage-services', 'dashboard.page.manage-services')->name('services');
    Route::view('/manage-exchange-rates', 'dashboard.page.manage-exchange-rate')->name('rates');
    Route::view('/manage-news', 'dashboard.page.manage-news')->name('news');


    //********* Our Partner Route *********//
    Route::resource('partners', OurPartnerController::class);
    Route::get('partners/active/{id}', [OurPartnerController::class, 'activate'])->name('partners.active');

    //********* financial_reports Route *********//
    Route::resource('reports', ReportController::class);
    Route::get('reports/active/{id}', [ReportController::class, 'activate'])->name('reports.active');

    //********* Services Route *********//
    Route::controller(ServiceController::class)->group(function (){
        Route::get('services-index', 'index')->name('services.index');
        Route::post('services-update/{id}', 'update')->name('services-update');
        Route::post('services-edit', 'edit')->name('services-edit');
        Route::get('services-create', 'create')->name('services-create');
        Route::post('services-store', 'store')->name('services.store');
        Route::post('services.delete/{id}', 'destroy')->name('services.destroy');
        Route::get('services/active/{id}', 'activate')->name('services.active');
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

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
