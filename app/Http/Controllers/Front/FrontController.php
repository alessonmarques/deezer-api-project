<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Support\Deezer;

use Illuminate\Support\Facades\Session;

class FrontController extends Controller
{
    public function showHomePage()
    {
        if(Session::has('user'))
        {
            return view('front.pages.home');
        }
        else
        {
            return $this->showLoginPage();
        }
    }

    public function showLoginPage()
    {
        return view('front.pages.login');
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
        $track = new Track(3135556);
        dd($track);
        */

    }

    public function deezerLogin()
    {
        $app = new Deezer();
        return $app->authUser();
    }

    public function deezerLogout()
    {
        Session::forget('user');
        Session::forget('app');

        return redirect(route('front.home'));
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
