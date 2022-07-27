<?php

use App\Http\Controllers\dashboard\ContactInfoController;
use App\Http\Controllers\dashboard\HomeController;
use App\Http\Controllers\dashboard\JobController;
use App\Http\Controllers\dashboard\OurPartnerController;
use App\Http\Controllers\dashboard\ReportController;
use App\Http\Controllers\dashboard\RoleController;
use App\Http\Controllers\dashboard\ServiceController;
use App\Http\Controllers\dashboard\SettingController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\dashboard\WebInfoController;
use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend;


/*
|--------------------------------------------------------------------------
| General Routes
|--------------------------------------------------------------------------|
*/
Route::get('change-language/{locale}', [LocaleController::class, 'switch'])->name('change-language');

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------|
*/

Route::controller(frontend\HomeController::class)->group(function (){

    Route::get('/', 'index')->name('home');
    Route::get('service/{id}', 'detailsService')->name('service');
    Route::get('success-story/{id}', 'successStory')->name('success-story');
    Route::get('contact-us', 'contactUs')->name('contact-us');
    Route::get('about-us/{id?}', 'aboutUs')->name('about-us');
    Route::get('partner', 'partner')->name('partner');
    Route::get('administration-members', 'adminMembers')->name('admin-members');
    Route::get('report', 'report')->name('report');

});




/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------|
*/
Route::prefix('dashboard/')->middleware('web','auth')->name('dashboard.')->group(function (){

    //********* Pages Route *********//
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/manage-categories', 'categories')->name('categories');
        Route::get('/manage-regions', 'regions')->name('region');
        Route::get('/manage-exchange-rates', 'rates')->name('rates');
        Route::get('/manage-news', 'news')->name('news');
        Route::get('/manage-service-points', 'servicePoint')->name('service.point');
    });

    //********* Users Route *********//
    Route::resource('users', UserController::class);

    //********* User Setting Route *********//
    Route::controller(SettingController::class)->group(function (){
        Route::get('/settings', 'index')->name('settings');
        Route::post('update-avatar', 'updateAvatar')->name('update.avatar');
        Route::post('update-account', 'updateAccount')->name('update.account');
        Route::post('update-password', 'updatePassword')->name('update.password');
        Route::get('delete-account', 'deleteAccount')->name('delete.account');
    });

    //********* Our Partner Route *********//
    Route::resource('partners', OurPartnerController::class);
    Route::get('partners/active/{id}', [OurPartnerController::class, 'activate'])->name('partners.active');

    //********* Our Jobs Route *********//
    Route::resource('jobs', JobController::class);
    Route::get('jobs/active/{id}', [JobController::class, 'activate'])->name('jobs.active');

    //********* financial_reports Route *********//
    Route::resource('reports', ReportController::class);
    Route::get('reports/active/{id}', [ReportController::class, 'activate'])->name('reports.active');

    //********* Services Route *********//
    Route::controller(ServiceController::class)->group(function (){
        Route::get('services-index', 'index')->name('services.index');
        Route::post('services-update/{id}', 'update')->name('services-update');
        Route::post('services-edit', 'edit')->name('services-edit');
        Route::post('services-show', 'show')->name('services-show');
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

    //********* Roles Route *********//
    Route::resource('roles', RoleController::class);

});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
