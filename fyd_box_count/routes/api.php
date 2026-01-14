<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\box_count_controller;
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

Route::post('/v1/auth', [LoginController::class, 'api_login']);

Route::middleware('auth:sanctum')->controller(box_count_controller::class)->group(function () {
    Route::post('/v1/box-count/create-transaction', 'create_transaction')->name('box-count.create-transaction');
    Route::post('/v1/box-count/update-count', 'update_count')->name('box-count.update-count');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
