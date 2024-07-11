<?php

use App\Http\Controllers\MobileApp\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('test','AccountController@test');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getCategories','BlogController@getCategories');
Route::get('getBlogs','BlogController@getBlogs');
Route::get('featuredBlogs','BlogController@featuredBlogs');
Route::group(['middelware' => 'auth:sanctum'], function () {

});

