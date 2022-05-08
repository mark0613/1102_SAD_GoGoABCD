<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\ReaderController;

Route::get('/', [HomeController::class, "indexPage"]);

// user/auth/*
Route::group(['prefix' => 'user'], function() {
    Route::group(['prefix' => 'auth'], function() {
        Route::get('/register', [UserAuthController::class, 'registerPage']);
        Route::post('/register', [UserAuthController::class, 'registerUserProcess']);
        Route::get('/login', [UserAuthController::class, 'loginPage']);
        Route::post('/login', [UserAuthController::class, 'loginProcess']);
        Route::get('/logout', [UserAuthController::class, 'logout']);
    });
});

// admin/*
Route::group(['prefix' => 'admin'], function() {
    Route::get('/product', [AdminController::class, 'productPage']);
    Route::post('/product', [AdminController::class, 'productProcess']);
    Route::get('/record', [AdminController::class, 'recordPage']);
    Route::get('/discount', [AdminController::class, 'discountPage']);
    Route::get('/ad', [AdminController::class, 'adPage']);

});

?>