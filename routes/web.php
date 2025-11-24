<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\NewsCrudController;
use App\Http\Controllers\Admin\UserCrudController;
use Illuminate\Support\Facades\Route;

Route::get('/', static function () {
    return view('welcome');
});

Route::get('/dashboard', HomeController::class);

Route::group(['prefix' => 'admin'], static function() {
    Route::group(['prefix' => 'news'], static function() {
        Route::get('/', [NewsCrudController::class, 'index'])->name('admin.news.index');
        Route::get('create', [NewsCrudController::class, 'create'])->name('admin.news.create');
        Route::post('store', [NewsCrudController::class, 'store'])->name('admin.news.store');
    });

    Route::group(['prefix' => 'users'], static function() {
        Route::get('/', [UserCrudController::class, 'index'])->name('admin.users.index');
    });
});

Auth::routes();