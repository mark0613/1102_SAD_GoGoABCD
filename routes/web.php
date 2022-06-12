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
    Route::get('/cs', [AdminController::class, 'csPage']);
});

// api/*
Route::group(['prefix' => 'api'], function() {
    // shopping cart
    Route::post('/addProductToCart', [ApiController::class, 'addProductToCart']);
    Route::post('/removeProductFromCart', [ApiController::class, 'removeProductFromCart']);
    Route::post('/updateQuantity', [ApiController::class, 'updateQuantity']);
    // wishlist
    Route::post('/addProductToWishlist', [ApiController::class, 'addProductToWishlist']);
    Route::post('/removeProductFromWishlist', [ApiController::class, 'removeProductFromWishlist']);
    // payment
    Route::post('/pay', [ApiController::class, 'pay']);
    // reader
    Route::post('/checkPageExists', [ApiController::class, 'checkPageExists']);
    // record
    Route::post('/searchRecord', [ApiController::class, 'searchRecord']);
    // merchant platform
    Route::post('/deleteStaff', [ApiController::class, 'deleteStaff']);
    Route::post('/getProduct', [ApiController::class, 'getProduct']);
    Route::post('/updateProduct', [ApiController::class, 'updateProduct']);
    Route::post('/deleteProduct', [ApiController::class, 'deleteProduct']);
    Route::post('/deleteAdvertisement', [ApiController::class, 'deleteAdvertisement']);
    Route::post('/getChartData', [ApiController::class, 'getChartData']);
    // comment
    Route::post('/giveComment', [ApiController::class, 'giveComment']);
    // cs
    Route::post('/getCustomerServiceMessageOnCustomer', [ApiController::class, 'getCustomerServiceMessageOnCustomer']);
    Route::post('/getCustomerServiceMessageOnCS', [ApiController::class, 'getCustomerServiceMessageOnCS']);
    Route::post('/sendMessageOnCustomer', [ApiController::class, 'sendMessageOnCustomer']);
    Route::post('/sendMessageOnCS', [ApiController::class, 'sendMessageOnCS']);

    //test
    Route::get('/look', [ApiController::class, 'lookSession']);

});

// general (customer)
Route::get('/list', [CustomerController::class, 'listPage']);
Route::get('/all', [CustomerController::class, 'allPage']);
Route::get('/profile', [CustomerController::class, 'profilePage']);
Route::post('/profile', [CustomerController::class, 'profileProcess']);
Route::get('/wishlist', [CustomerController::class, 'wishlistPage']);
Route::get('/mybook', [CustomerController::class, 'mybookPage']);
Route::get('/mymusic', [CustomerController::class, 'mymusicPage']);
Route::get('/detail/{p_id}', [CustomerController::class, 'detailPage']);
Route::get('/cart', [CustomerController::class, 'cartPage']);
Route::get('/reader/{p_id}', [ReaderController::class, 'readerPage']);
Route::get('/record', [CustomerController::class, 'recordPage']);
Route::get('/cs', [CustomerController::class, 'csPage']);


?>