<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------|
*/
Route::prefix('dashboard/')->name('dashboard.')->group(function (){

    Route::view('/', 'dashboard.page.index')->name('home');
    Route::view('manage-regions', 'dashboard.page.manage-regions')->name('manage-regions');

});

// TODO: Just test
Route::post('/teste', function (){
    dd('ff');
})->name('teste');

