<?php

use Illuminate\Support\Facades\Route;

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


    Route::group(['middleware' => ['guest']], function () {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });
    Route::group(['middleware' => ['auth']], function () {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
    
});