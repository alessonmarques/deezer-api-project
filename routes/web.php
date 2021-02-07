<?php

use App\Http\Middleware\DeezerMiddleware;
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
    /*  FRONT LOGIN */
    Route::get('/login', 'FrontController@showLoginPage')->name('login');

    /*  ACCESS CONTROL */
    Route::group(['prefix' => '', 'as' => 'access'], function() {
        /*  DEBUG */
        Route::get('/debug-deezer', 'FrontController@debugDeezer')->name('.debug');


        Route::get('/deez-login', 'FrontController@deezerLogin')->name('.login');
        Route::get('/deez-token', 'FrontController@deezerGetToken')->name('.token');
        Route::get('/deez-callback', 'FrontController@deezerLoginCallBack')->name('.callback');
        Route::get('/deez-logout', 'FrontController@deezerLogout')->name('.logout');
    });

    /*  HOME */
    Route::group(['prefix' => '', 'as' => 'home', 'middleware' => ['deez']], function() {
        //Route::get('/', 'FrontController@showHomePage');
        Route::view('/', 'front.pages.home');


        /*  DEEZER */
        Route::group(['prefix' => '', 'as' => '.deezer'], function() {
            /*  MUSIC CONTROLL */
            Route::get('/play', 'FrontController@deezerPlay')->name('.play');

            /*  OPTIONS */
            Route::group(['prefix' => 'search', 'as' => '.search'], function() {
                Route::post('/perform', 'FrontController@performSearch')->name('.perform');
            });
            /*            */
            Route::group(['prefix' => 'music', 'as' => '.music'], function() {
                Route::get('/', 'FrontController@showMusics');
            });
            Route::group(['prefix' => 'show', 'as' => '.show'], function() {
                Route::get('/', 'FrontController@showPodcasts');
            });
            Route::group(['prefix' => 'explore', 'as' => '.explore'], function() {
                Route::get('/', 'FrontController@showExploration');
            });
            /*            */
            Route::group(['prefix' => 'favourite', 'as' => '.favourite'], function() {
                //Highlights
                Route::get('/', 'FrontController@showFavourites');
                //Favourite tracks
                Route::get('/favourite_tracks', 'FrontController@showFavouriteTracks')->name('.favourite_tracks');
                //Playlist
                Route::get('/playlists', 'FrontController@showFavouritePlaylists')->name('.playlists');
                //Albums
                Route::get('/albums', 'FrontController@showFavouriteAlbums')->name('.albums');
                //Artists
                Route::get('/artists', 'FrontController@showFavouriteArtists')->name('.artists');
                //Podcasts
                Route::get('/podcasts', 'FrontController@showFavouritePodcasts')->name('.podcasts');
                //Listening history
                Route::get('/listening_history', 'FrontController@showListeningHistory')->name('.listening_history');
                //Mixes
                Route::get('/mixes', 'FrontController@showMixes')->name('.mixes');
                //My MP3s
                Route::get('/mp3', 'FrontController@showMp3')->name('.mp3');
                //Following
                Route::get('/following', 'FrontController@showFollowing')->name('.following');
                //Followers
                Route::get('/followers', 'FrontController@showFollowers')->name('.followers');

            });

        });
    });

});
