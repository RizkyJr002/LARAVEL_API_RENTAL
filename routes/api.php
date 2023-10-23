<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\KelolaSewaController;
use App\Http\Controllers\Admin\LaporanMobilController;
use App\Http\Controllers\Admin\LaporanUserController;
use App\Http\Controllers\Admin\MerkController;
use App\Http\Controllers\Admin\PengembalianController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('merk',[MerkController::class, 'index']);
Route::post('merk/store',[MerkController::class, 'store']);
Route::get('merk/{id}',[MerkController::class, 'show']);
Route::post('merk/update/{id}',[MerkController::class, 'update']);
Route::delete('merk/destroy/{id}',[MerkController::class, 'destroy']);

Route::get('cars',[CarController::class, 'index']);
Route::post('cars/store',[CarController::class, 'store']);
Route::get('cars/show/{id}',[CarController::class, 'show']);

Route::get('contact',[ContactController::class, 'index']);
Route::post('contact/update/{id}',[ContactController::class, 'update']);
Route::get('contact/{id}',[ContactController::class, 'show']);

Route::get('users',[UserController::class, 'index']);
Route::put('users/store',[UserController::class, 'store']);

Route::get('sewa',[KelolaSewaController::class, 'index']);

Route::get('kategori',[KategoriController::class, 'index']);
Route::post('kategori/store',[KategoriController::class, 'store']);
Route::get('kategori/{id}',[KategoriController::class, 'show']);
Route::post('kategori/update/{id}',[KategoriController::class, 'update']);
Route::delete('kategori/destroy/{id}',[KategoriController::class, 'destroy']);

Route::get('kelola-sewa',[KelolaSewaController::class, 'index']);

Route::get('booking',[BookingController::class, 'index']);

Route::get('pengembalian',[PengembalianController::class, 'index']);

Route::get('laporan-user',[LaporanUserController::class, 'index']);
Route::delete('laporan-user/destroy/{id}',[LaporanUserController::class, 'destroy']);

Route::get('laporan-mobil',[LaporanMobilController::class, 'index']);

Route::get('faq',[FaqController::class, 'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
