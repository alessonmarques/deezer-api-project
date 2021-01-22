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

        /*  DEEZER */
        Route::group(['prefix' => '', 'as' => '.deezer'], function() {
            /*  MUSIC CONTROLL */
            Route::get('/play', 'FrontController@deezerPlay')->name('.play');

            /*  OPTIONS */
            Route::group(['prefix' => 'music', 'as' => '.music'], function() {
                Route::get('/', 'FrontController@showMusics');
            });
            Route::group(['prefix' => 'show', 'as' => '.show'], function() {
                Route::get('/', 'FrontController@showPodcasts');
            });
            Route::group(['prefix' => 'explore', 'as' => '.explore'], function() {
                Route::get('/', 'FrontController@showExplores');
            });
            Route::group(['prefix' => 'favorite', 'as' => '.favorite'], function() {
                Route::get('/', 'FrontController@showFavorites');
            });
            Route::group(['prefix' => 'search', 'as' => '.search'], function() {
                Route::get('/', 'FrontController@showSearchs');
                Route::post('/perform', 'FrontController@performSearch')->name('.perform');
            });

            /*  DEBUG */
            Route::get('/debug-deezer', 'FrontController@debugDeezer')->name('.debug');

            /*  ACCESS CONTROL */
            Route::get('/deez-login', 'FrontController@deezerLogin')->name('.login');
            Route::get('/deez-token', 'FrontController@deezerGetToken')->name('.token');
            Route::get('/deez-callback', 'FrontController@deezerLoginCallBack')->name('.callback');
            Route::get('/deez-logout', 'FrontController@deezerLogout')->name('.logout');
        });
    });
});
