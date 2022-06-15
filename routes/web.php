<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------|
*/
Route::prefix('dashboard/')->name('dashboard.')->group(function (){

    Route::view('/', 'dashboard.page.index')->name('home');
    Route::get('manage-regions', [CountryController::class, 'index'])->name('manage-regions');
    Route::post('manage-region',[CountryController::class, 'store'])->name('manage-region');;

});

Route::get('change-language/{locale}', [LocaleController::class, 'switch'])->name('change-language');

// TODO: Just test
Route::post('/teste', function (){
    dd('ff');
})->name('teste');

