<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Support\Deezer;
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

        $artists = $user->getArtists(['index' => 25]);

        dd(json_decode($artists));
    }
}
