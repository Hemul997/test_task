<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['name' => 'Admin', 'prefix' => 'admin'], function() {

});
