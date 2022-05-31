<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\CustomerController;

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
    Route::get('/', [AdminController::class, 'staffPage']);
    Route::post('/', [AdminController::class, 'staffProcess']);

    Route::get('/staff', [AdminController::class, 'staffPage']);
    Route::post('/staff', [AdminController::class, 'staffProcess']);

    Route::get('/product', [AdminController::class, 'productPage']);
    Route::post('/product', [AdminController::class, 'productProcess']);

    Route::get('/record', [AdminController::class, 'recordPage']);

    Route::get('/discount', [AdminController::class, 'discountPage']);

    Route::get('/ad', [AdminController::class, 'adPage']);
    Route::post('/ad', [AdminController::class, 'adProcess']);

    Route::get('/chart', [AdminController::class, 'chartPage']);
});

Route::get('/list', [CustomerController::class, 'listPage']);
Route::get('/all', [CustomerController::class, 'allPage']);
Route::get('/profile', [CustomerController::class, 'profilePage']);
Route::post('/profile', [CustomerController::class, 'profileProcess']);
Route::get('/wishlist', [CustomerController::class, 'wishlistPage']);
Route::get('/mybook', [CustomerController::class, 'mybookPage']);
Route::get('/mymusic', [CustomerController::class, 'mymusicPage']);
Route::get('/detail/{p_id}', [CustomerController::class, 'detailPage']);
Route::get('/cart', [CustomerController::class, 'cartPage']);

Route::group(['prefix' => 'api'], function() {
    Route::post('/addProductToCart', [ApiController::class, 'addProductToCart']);
    Route::post('/removeProductFromCart', [ApiController::class, 'removeProductFromCart']);
    Route::post('/updateQuantity', [ApiController::class, 'updateQuantity']);
    Route::post('/addProductToWishlist', [ApiController::class, 'addProductToWishlist']);
    Route::post('/removeProductFromWishlist', [ApiController::class, 'removeProductFromWishlist']);
    Route::post('/pay', [ApiController::class, 'pay']);
    Route::get('/product', [ApiController::class, 'product']);
    Route::get('/record', [ApiController::class, 'record']);
    Route::get('/discount', [ApiController::class, 'discount']);
    Route::get('/look', [ApiController::class, 'lookSession']);

});

?>