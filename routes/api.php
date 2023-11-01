<?php

use App\Http\Controllers\Admin\AlamatUserController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\KelolaSewaController;
use App\Http\Controllers\Admin\LaporanMobilController;
use App\Http\Controllers\Admin\LaporanUserController;
use App\Http\Controllers\Admin\MasukkanController;
use App\Http\Controllers\Admin\MerkController;
use App\Http\Controllers\Admin\MobilController;
use App\Http\Controllers\Admin\PemesananController;
use App\Http\Controllers\Admin\PengembalianController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Auth\LoginController;
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

Route::get('contact',[ContactController::class, 'index']);
Route::post('contact/update/{id}',[ContactController::class, 'update']);
Route::get('contact/{id}',[ContactController::class, 'show']);

Route::get('users',[UserController::class, 'index']);
Route::delete('users/destroy/{id}',[UserController::class, 'destroy']);

Route::get('sewa',[KelolaSewaController::class, 'index']);

Route::get('mobil',[MobilController::class, 'index']);
Route::post('mobil',[MobilController::class, 'show']);
Route::post('mobil/store',[MobilController::class, 'store']);
Route::delete('mobil/destroy/{id}',[MobilController::class, 'destroy']);

Route::get('kategori',[KategoriController::class, 'index']);
Route::post('kategori/store',[KategoriController::class, 'store']);
Route::get('kategori/{id}',[KategoriController::class, 'show']);
Route::post('kategori/update/{id}',[KategoriController::class, 'update']);
Route::delete('kategori/destroy/{id}',[KategoriController::class, 'destroy']);

Route::get('kelola-sewa',[KelolaSewaController::class, 'index']);

Route::get('booking',[BookingController::class, 'index']);
Route::post('booking/store',[BookingController::class, 'store']);

Route::get('pemesanan',[PemesananController::class, 'index']);
Route::post('pemesanan/store',[PemesananController::class, 'store']);

Route::get('pengembalian',[PengembalianController::class, 'index']);

Route::get('laporan-user',[LaporanUserController::class, 'index']);
Route::delete('laporan-user/destroy/{id}',[LaporanUserController::class, 'destroy']);

Route::get('laporan-mobil',[LaporanMobilController::class, 'index']);

Route::get('faq',[FaqController::class, 'index']);
Route::post('faq/store',[FaqController::class, 'store']);

Route::get('alamat-user',[AlamatUserController::class, 'index']);
Route::post('alamat-user/store',[AlamatUserController::class, 'store']);
Route::delete('alamat-user/destroy/{id}',[AlamatUserController::class, 'destroy']);

Route::get('masukkan',[MasukkanController::class, 'index']);
Route::post('masukkan/store',[MasukkanController::class, 'store']);
Route::delete('masukkan/destroy/{id}',[MasukkanController::class, 'destroy']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [ApiController::class, 'login']);
Route::post('register', [ApiController::class, 'register']);
Route::post('logout', [ApiController::class, 'logout']);