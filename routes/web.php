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
    
    Route::get('/admin/categories', 'CategoryController@index')->name('admin.categories.index');
    Route::get('/admin/categories/add', 'CategoryController@create')->name('admin.categories.create');
    Route::post('/admin/categories/add', 'CategoryController@add')->name('admin.categories.add');
    Route::get('/admin/categories/edit/{id}', 'CategoryController@edit')->name('admin.categories.edit');
    Route::post('/admin/categories/update', 'CategoryController@update')->name('admin.categories.update');
    Route::get('/admin/categories/delete/{id}', 'CategoryController@delete')->name('admin.categories.delete');

    Route::group(['middleware' => ['guest']], function () {
        

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    
});