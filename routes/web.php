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


Route::group(['prefix' => '', 'namespace' => 'Front', 'as' => 'front.'], function() {
    Route::group(['prefix' => '', 'as' => 'home'], function() {
        Route::get('/', 'FrontController@showHomePage');
        //
        Route::get('/debug-deezer', 'FrontController@debugDeezer')->name('.debug');
    });
});
