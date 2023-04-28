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


});
