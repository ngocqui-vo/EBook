<?php

use App\Models\User;
use App\Models\BookPart;
use Illuminate\Support\Facades\Route;
use App\Jobs\SendBookPartNotification;
use App\Notifications\BookPartPublished;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(['namespace' => 'App\Http\Controllers'], function () {

    //search
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/search', 'HomeController@search')->name('home.search');

    // home
    Route::get('/categories', 'HomeController@categories')->name('home.categories');
    Route::get('/categories/{id}', 'HomeController@categoryDetail')->name('home.categoryDetail');
    Route::get('/authors', 'HomeController@authors')->name('home.authors');
    Route::get('/authors/{id}', 'HomeController@authorDetail')->name('home.authorDetail');
    Route::get('/books/{id}', 'HomeController@bookDetail')->name('home.bookDetail');



    Route::group(['middleware' => ['guest']], function () {
        // Register Routes
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');
        
        // Login Routes
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');
    });
    Route::group(['middleware' => ['auth']], function () {
        // Logout Routes
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        // comment
        Route::post('/comment', 'HomeController@review')->name('home.review');
        
        // follow book
        Route::get('/follow/{id}', 'BookController@followBook')->name('book.followBook');

        // user
        Route::get('/user/center', 'UserController@center')->name('user.center');
        Route::post('/user/changePassword', 'UserController@changePassword')->name('user.changePassword');

        Route::group(['middleware' => ['admin']], function () {
            

            // Categories
            Route::get('/admin/categories', 'CategoryController@index')->name('admin.categories.index');
            Route::get('/admin/categories/add', 'CategoryController@create')->name('admin.categories.create');
            Route::post('/admin/categories/add', 'CategoryController@add')->name('admin.categories.add');
            Route::get('/admin/categories/edit/{id}', 'CategoryController@edit')->name('admin.categories.edit');
            Route::post('/admin/categories/update', 'CategoryController@update')->name('admin.categories.update');
            Route::get('/admin/categories/delete/{id}', 'CategoryController@delete')->name('admin.categories.delete');

            // Authors
            Route::get('/admin/authors', 'AuthorController@index')->name('admin.authors.index');
            Route::get('/admin/authors/create', 'AuthorController@create')->name('admin.authors.create');
            Route::post('/admin/authors/store', 'AuthorController@store')->name('admin.authors.store');
            Route::get('/admin/authors/delete/{id}', 'AuthorController@delete')->name('admin.authors.delete');
            Route::get('/admin/authors/edit/{id}', 'AuthorController@edit')->name('admin.authors.edit');
            Route::post('/admin/authors/update', 'AuthorController@update')->name('admin.authors.update');

            // Books
            Route::get('/admin/books', 'BookController@index')->name('admin.books.index');
            Route::get('/admin/books/create', 'BookController@create')->name('admin.books.create');
            Route::post('/admin/books/store', 'BookController@store')->name('admin.books.store');
            Route::get('/admin/books/edit/{id}', 'BookController@edit')->name('admin.books.edit');
            Route::post('/admin/books/update', 'BookController@update')->name('admin.books.update');
            Route::post('/admin/books/delete/{id}', 'BookController@delete')->name('admin.books.delete');

            // Bookparts
            Route::get('/admin/books/{id}/bookparts/create', 'BookPartController@create')->name('admin.bookparts.create');
            Route::post('/admin/books/bookparts/store', 'BookPartController@store')->name('admin.bookparts.store');
            Route::get('/admin/books/bookparts/edit/{id}', 'BookPartController@edit')->name('admin.bookparts.edit');
            Route::post('/admin/books/bookparts/update', 'BookPartController@update')->name('admin.bookparts.update');
            Route::get('/admin/books/bookparts/delete/{id}', 'BookPartController@delete')->name('admin.bookparts.delete');


            // Users
            Route::get('/admin/users', 'UserController@index')->name('admin.users.index');
            Route::get('/admin/users/create', 'UserController@create')->name('admin.users.create');
            Route::post('/admin/users/store', 'UserController@store')->name('admin.users.store');
            Route::get('/admin/users/edit/{id}', 'UserController@edit')->name('admin.users.edit');
            Route::post('/admin/users/update', 'UserController@update')->name('admin.users.update');
            Route::get('/admin/users/delete/{id}', 'UserController@delete')->name('admin.users.delete');


            // cart
            Route::post('/cart/add', 'CartController@add')->name('cart.add');
            Route::post('/cart/test', 'CartController@test')->name('cart.test');
            Route::get('/cart/cartDetail', 'CartController@cartDetail')->name('cart.cartDetail');
            Route::post('/cart/cartRemove', 'CartController@removeCartItem')->name('cart.cartRemove');
            Route::get('/cart/orderConfirm', 'CartController@orderConfirm')->name('cart.orderConfirm');
            Route::post('/cart/payment', 'CartController@payment')->name('cart.payment');
            Route::get('/cart/orderDetail/{id}', 'CartController@orderDetail')->name('cart.orderDetail');

            // statistic
            Route::get('/admin/statistics', 'StatisticController@index')->name('admin.statistic');
        });
    });
});

