<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Support\Album;
use App\Support\Artist;
use App\Support\User;
use App\Support\Chart;
use App\Support\Track;

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
            $user->get();
            $info = $user->getFlow();
            //
            $artist = new Artist(7299518);
            $artist->get();
            $info = $artist->getTop();
            //
            $album = new Album(10504582);
            $album->get();
            $info = $artist->getFans();
            //
            $chart = new Chart(1159617832);
            $chart->get();
            $info = $chart->getArtists();
            //
            $track = new Track(3135555);
            $track->setId(3135556);
            $info = $track->get();
            //
        */
        $album = new Album(10504582);
        $album->get();
        $info = $album->getFans();
        dd(json_decode($info));
    }
}
