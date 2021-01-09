<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Support\Deezer;

class FrontController extends Controller
{
    public function showHomePage()
    {
        return view('front.pages.home');
    }

    public function debugDeezer()
    {
        $deezer = new Deezer();

        $response = $deezer->getUser(1439842866);

        dd(json_decode($response));
    }
}
