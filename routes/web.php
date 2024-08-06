<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Customer\CustoemerController;

Route::get('/', function () {
    return redirect()->route('register');
});

Route::get('/logout', function () {
    auth()->logout();
    return redirect()->route('login');
});

//flush cache
Route::get('/cache-clear', function () {
    Artisan::call('optimize:clear');
    return "Cache is cleared";
});


Route::middleware(['auth', 'verified'])->group(function () {

    Route::controller(CustoemerController::class)->group(function () {
        Route::get('/stores', 'index')->name('customer.index');
    });

});
