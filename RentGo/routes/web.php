<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ============================================================================
// =============================== P U B L I C ================================
// ============================================================================

Route::get('/', 'PageController@welcome')->name('home');
Route::get('/contact', 'PageController@contact')->name('contact');
Route::get('/car', 'PageController@car')->name('car');
Route::get('/about', 'PageController@about')->name('about');

// ============================================================================
// ================================ L O G I N =================================
// ============================================================================

Auth::routes();

Route::middleware('auth')->group(function () {


    // ================================ USER =================================


    Route::get('/car/{id}', 'PageController@car_detail')->name('detailCar');
    Route::post('/car/{id}', 'PageController@order')->name('user.order');
    Route::get('/cart', 'PageController@cart')->name('cart');
    Route::post('/upload-image/{id}', 'PageController@uploadimage')->name('upload.image');

    // Profile
    Route::prefix('profile')->name('profile')->group(function () {
        Route::get('/', 'ProfileController@index')->name('');
        Route::post('/', 'ProfileController@update_process')->name('.update.process');
        Route::post('/update-password', 'ProfileController@change_password')->name('.update.password.process');
    });


    // ================================ A D M I N =================================

    Route::middleware('admin')->prefix('admin')->group(function () {

        // Admin Home
        Route::get('/home', 'DashboardController@index')->name('admin.home');

        // About
        Route::get('/about', 'Controller@about')->name('admin.about');

        // Order
        Route::prefix('order')->name('order')->group(function () {
            Route::get('/', 'OrderController@index')->name('');
            Route::get('/update/{id}', 'OrderController@update_view')->name('.update');
            Route::post('/update/{id}', 'OrderController@update_process')->name('.update.process');
            Route::get('/delete/{id}', 'OrderController@delete')->name('.delete');
        });

        // Product
        Route::prefix('product')->name('product')->group(function () {
            Route::get('/', 'ProductsController@index')->name('');
            Route::get('/create', 'ProductsController@create_view')->name('.create');
            Route::post('/create', 'ProductsController@create_process')->name('.create.process');
            Route::get('/update/{id}', 'ProductsController@update_view')->name('.update');
            Route::post('/update/{id}', 'ProductsController@update_process')->name('.update.process');
            Route::get('/delete/{id}', 'ProductsController@delete')->name('.delete');
        });

        // Categories
        Route::prefix('category')->name('category')->group(function () {
            Route::get('/', 'CategoryController@index')->name('');
            Route::get('/create', 'CategoryController@create_view')->name('.create');
            Route::post('/create', 'CategoryController@create_process')->name('.create.process');
            Route::get('/update/{id}', 'CategoryController@update_view')->name('.update');
            Route::post('/update/{id}', 'CategoryController@update_process')->name('.update.process');
            Route::get('/delete/{id}', 'CategoryController@delete')->name('.delete');
        });

        // Users
        Route::prefix('user')->name('user')->group(function () {
            Route::get('/', 'UsersController@index')->name('');
            Route::get('/create', 'UsersController@create_view')->name('.create');
            Route::post('/create', 'UsersController@create_process')->name('.create.process');
            Route::get('/update/{id}', 'UsersController@update_view')->name('.update');
            Route::post('/update/{id}', 'UsersController@update_process')->name('.update.process');
            Route::post('/update-password/{id}', 'UsersController@change_password')->name('.update.password.process');
            Route::post('/update-store/{id}', 'UsersController@change_store')->name('.update.store.process');
            Route::get('/delete/{id}', 'UsersController@delete')->name('.delete');
        });
    });
});
