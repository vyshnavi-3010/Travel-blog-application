<?php

use Illuminate\Support\Facades\Route;

Route::get('login', 'AccountController@login')->name('admin.login');
Route::post('login', 'AccountController@loginAction')->name('loginAction');
Route::post('validateAdminEmail', 'AccountController@checkEmail')->name('validateAdminEmail');
Route::group(['middleware' => 'admin'], function () {
    Route::get('dashboard', 'AccountController@dashboard')->name('admin.dashboard');
    Route::get('logout', 'AccountController@logout')->name('admin.logout');
    // Category
    Route::resource('category', 'CategoryController');
    Route::get('category/delete/{id}', 'CategoryController@destroy');
    //Blog
    Route::resource('blog', 'BlogController');
    Route::get('blog/delete/{id}', 'BlogController@destroy');

});
