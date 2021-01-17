<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Session;


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
        Route::group(['prefix' => '', 'as' => '.deezer'], function() {
            Route::get('/debug-deezer', 'FrontController@debugDeezer')->name('.debug');
            //
            Route::get('/test', 'FrontController@testBootstrap')->name('.test');
            //
            Route::get('/deez-login', 'FrontController@deezerLogin')->name('.login');
            Route::get('/deez-callback', 'FrontController@deezerLoginCallBack')->name('.callback');
            Route::get('/deez-logout', 'FrontController@deezerLogout')->name('.logout');
            //
            Route::get('/deez-token', 'FrontController@deezerGetToken')->name('.token');
        });
    });
});
