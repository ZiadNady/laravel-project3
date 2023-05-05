<?php

use App\Http\Controllers\{
    ProvinceController,
    ProductController,
    PharmacyController,
    DistrictController,
    CountryController,
    RoleController,
    PharmacyProductController
};

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


Route::middleware(['admin'])->prefix('/Admin')->group(function () {
        Route::view('/', 'Admin')->name('Admin');
        Route::prefix('/countries')->group(function () {
        Route::get('/create', [CountryController::class, 'create'])->name('countries.create');
        Route::get('/', [CountryController::class, 'index'])->name('countries.index');
        Route::post('/store', [CountryController::class, 'store'])->name('countries.store');
        Route::get('/delete/{id}', [CountryController::class, 'destroy'])->name('countries.destroy');
        Route::get('/edit/{id}', [CountryController::class, 'edit'])->name('countries.edit');
        Route::put('/update', [CountryController::class, 'update'])->name('countries.update');
    });

    Route::prefix('/provinces')->group(function () {
        Route::get('/create', [ProvinceController::class, 'create'])->name('provinces.create');
        Route::get('/', [ProvinceController::class, 'index'])->name('provinces.index');
        Route::post('/store', [ProvinceController::class, 'store'])->name('provinces.store');
        Route::get('/delete/{id}', [ProvinceController::class, 'destroy'])->name('provinces.destroy');
        Route::get('/edit/{id}', [ProvinceController::class, 'edit'])->name('provinces.edit');
        Route::put('/update', [ProvinceController::class, 'update'])->name('provinces.update');
        });

    Route::prefix('/District')->group(function () {
        Route::get('/create', [DistrictController::class, 'create'])->name('districts.create');
        Route::get('/', [DistrictController::class, 'index'])->name('districts.index');
        Route::post('/store', [DistrictController::class, 'store'])->name('districts.store');
        Route::get('/delete/{id}', [DistrictController::class, 'destroy'])->name('districts.destroy');
        Route::get('/edit/{id}', [DistrictController::class, 'edit'])->name('districts.edit');
        Route::put('/update', [DistrictController::class, 'update'])->name('districts.update');
          });

    Route::prefix('/Pharmacy')->group(function () {
        Route::get('/create', [PharmacyController::class, 'create'])->name('pharmacy.create');
        Route::get('/', [PharmacyController::class, 'index'])->name('pharmacy.index');
        Route::post('/store', [PharmacyController::class, 'store'])->name('pharmacy.store');
        Route::get('/delete/{id}', [PharmacyController::class, 'destroy'])->name('pharmacy.destroy');
        Route::get('/edit/{id}', [PharmacyController::class, 'edit'])->name('pharmacy.edit');
        Route::put('/update', [PharmacyController::class, 'update'])->name('pharmacy.update');
    });

    Route::prefix('/Product')->group(function () {
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/update', [ProductController::class, 'update'])->name('product.update');
    });

    Route::prefix('/pharmacyProduct')->group(function () {
        Route::get('/create', [PharmacyProductController::class, 'create'])->name('pharmacyProduct.create');
        Route::get('/{id}', [PharmacyProductController::class, 'index'])->name('pharmacyProduct.index');
        Route::post('/store', [PharmacyProductController::class, 'store'])->name('pharmacyProduct.store');
        Route::get('/delete/{id}', [PharmacyProductController::class, 'destroy'])->name('pharmacyProduct.destroy');
        Route::get('/edit/{id}', [PharmacyProductController::class, 'edit'])->name('pharmacyProduct.edit');
        Route::put('/update', [PharmacyProductController::class, 'update'])->name('pharmacyProduct.update');
    });

    Route::resource('/Role', RoleController::class)->parameters([
        'destroy' => 'id'
    ])->names([
        'edit' => 'roles.edit',
        'destroy' => 'roles.destroy',
        'update' => 'roles.update',
        'create' => 'roles.create',
        'store' => 'roles.store',
        'index' => 'roles.index',
        'show' => 'roles.show',
        'index_all' => 'roles.index_all'
    ]);;;


});

