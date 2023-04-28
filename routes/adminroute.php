<?php

use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('admin', 'Admin');
Route::middleware(['admin'])->group(function () {
    Route::prefix('/countries')->group(function () {
        Route::get('/create', [CountryController::class, 'create'])->name('countries.create');
        Route::post('/store', [CountryController::class, 'store'])->name('countries.store');
    });

<<<<<<< HEAD
=======
    Route::get('/user/profile', function () {
        // Uses first & second middleware...
    });

    Route::get('admin/countries/create', [CountryController::class, 'create'])->name('countries.create');
    Route::post('admin/countries/store', [CountryController::class, 'store'])->name('countries.store');
>>>>>>> 5f224ce0ed9f7bfadb101b68019c799187a52f04

});
