<?php

use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
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

Route::get('/', function () {
    return view('home.index');
});


Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('custom-login', [LoginController::class, 'customLogin'])->name('login.custom');

Route::get('registration', [LoginController::class, 'registration'])->name('register');
Route::post('custom-registration', [LoginController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [UserController::class, 'signOut'])->name('signout');


// Route::get('/countries', [CountryController::class, 'index'])->name('countries.index');
// Route::get('/countries/{id}', [CountryController::class, 'show'])->name('countries.show');
// Route::get('/countries/{id}/edit', [CountryController::class, 'edit'])->name('countries.edit');
// Route::put('/countries/{id}', [CountryController::class, 'update'])->name('countries.update');
// Route::delete('/countries/{id}', [CountryController::class, 'destroy'])->name('countries.destroy');

