<?php

use App\Http\Controllers\API\NewsController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\UserProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/get-auth-token', [UserController::class, 'getAuthToken'])
    ->name('get-auth-token')
    ->middleware('auth.basic');

Route::group(['prefix' => 'user', 'middleware' => 'auth:sanctum'], static function () {
    Route::get('/profile', [UserProfileController::class, 'show']);
    Route::patch('/profile', [UserProfileController::class, 'update']);
});

Route::apiResource('/news', NewsController::class)
    ->only(['index', 'store', 'show'])
    ->middleware('auth:sanctum');