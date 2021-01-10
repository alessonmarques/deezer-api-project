<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Support\Artist;
use App\Support\User;

class FrontController extends Controller
{
    public function showHomePage()
    {
        return view('front.pages.home');
    }

    public function debugDeezer()
    {
        $user = new User(1439842866);
        $user->get();
        $info = $user->getFlow();
        //
        $artist = new Artist(7299518);
        $artist->get();
        $info = $artist->getTop();
        //

        dd(json_decode($info));
    }
}
