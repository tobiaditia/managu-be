<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\UserController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('user', [UserController::class, 'user']);

    Route::apiResources(['gudang' => GudangController::class]);
});
