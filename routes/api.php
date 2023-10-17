<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\MerkController;
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
Route::get('merk/show/{id}',[MerkController::class, 'show']);
Route::post('merk/update/{id}',[MerkController::class, 'update']);
Route::get('merk/destroy/{id}',[MerkController::class, 'destroy']);

Route::get('cars',[CarController::class, 'index']);
Route::post('cars/store',[CarController::class, 'store']);
Route::get('cars/show/{id}',[CarController::class, 'show']);

Route::get('contact',[ContactController::class, 'index']);
Route::post('contact/update/{id}',[ContactController::class, 'update']);

Route::get('users',[UserController::class, 'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
