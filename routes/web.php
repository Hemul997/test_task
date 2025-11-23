<?php

use App\Http\Controllers\Admin\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', static function () {
    return view('welcome');
});

Route::group(['name' => 'Admin', 'prefix' => 'admin'], static function() {

});

Auth::routes();