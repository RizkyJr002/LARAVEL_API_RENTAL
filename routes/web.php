<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'is_admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('cars', \App\Http\Controllers\Admin\CarController::class);
    Route::put('cars/update-image/{id}', [\App\Http\Controllers\Admin\CarController::class, 'updateImage'])->name('cars.updateImage');

    Route::resource('merk', \App\Http\Controllers\Admin\MerkController::class);

    Route::resource('profile', \App\Http\Controllers\Admin\ProfileController::class);

    Route::resource('kontak', \App\Http\Controllers\Admin\ContactController::class);

    Route::resource('user', \App\Http\Controllers\Admin\UserController::class);
    Route::put('user/update-image/{id}', [\App\Http\Controllers\Admin\UserController::class, 'updateImage'])->name('user.updateImage');
});

Auth::routes(['register' => false]);
