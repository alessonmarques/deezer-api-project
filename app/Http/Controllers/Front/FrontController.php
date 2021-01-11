<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Support\Deezer;
//
use App\Support\Album;
use App\Support\Artist;
use App\Support\User;
use App\Support\Chart;
use App\Support\Track;
use App\Support\Search;
use GuzzleHttp\Psr7\Header;

class FrontController extends Controller
{
    public function showHomePage()
    {
        return view('front.pages.home');
    }

    public function debugDeezer()
    {
        /*
            $user = new User(1439842866);
            $info = $user->getFlow();
            //
            $artist = new Artist(7299518);
            $info = $artist->getTop();
            //
            $album = new Album(10504582);
            $info = $artist->getFans();
            //
            $chart = new Chart(1159617832);
            $info = $chart->getArtists();
            //
            $search = new Search();
            $info = $album->getArtist(['q' => 'djonga', 'order' => 'ranking']);
        */

        $track = new Track(3135556);
        dd($track);
    }

    public function deezerLogin()
    {
        $app = new Deezer();
        return $app->authUser();
    }

    public function deezerLoginCallBack()
    {
        $app = new Deezer();
        return $app->authTreatment();
    }

    public function deezerGetToken()
    {
        $app = new Deezer();
        return $app->generateAccessToken();
    }
}
