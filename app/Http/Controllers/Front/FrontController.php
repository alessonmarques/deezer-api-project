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
        //$deezer = new Deezer();
        //$response = $deezer->getUser(1439842866);

        $user = new User();
        $response = $user->getUser(1439842866);


        dd(json_decode($response));
    }
}
