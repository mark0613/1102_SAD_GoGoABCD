<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserAuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'user'], function(){
    Route::group(['prefix' => 'auth'], function(){
        Route::get('/register', [UserAuthController::class, 'registerPage']);
        Route::post('/register', [UserAuthController::class, 'registerProcess']);
        Route::get('/login', [UserAuthController::class, 'loginPage']);
        Route::post('/login', [UserAuthController::class, 'loginProcess']);
        Route::get('/logout', [UserAuthController::class, 'logout']);
    });
});
?>