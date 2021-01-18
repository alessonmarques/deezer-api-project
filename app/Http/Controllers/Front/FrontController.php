<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use app\Support\Deezer;

class FrontController extends Controller
{
    public function isLoggedIn()
    {
        if(Session::has('user'))
        {
            $user = Session::get('user');
            if(date('Y-m-d H:i:s') >= $user->tokenDestroyTime) $this->deezerGetToken();
            return true;
        }
        return false;
    }


    public function showHomePage()
    {
        if($this->isLoggedIn())
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

    /*  */

    public function showMusics()
    {
        if($this->isLoggedIn())
        {
            $user = Session::get('user');

            $albums     = $user->getRecommendations('albums');
            $artists    = $user->getRecommendations('artists');
            $playlists  = $user->getRecommendations('playlists');
            $tracks     = $user->getRecommendations('tracks');
            $radios     = $user->getRecommendations('radios');

            $recents    = $user->getHistory();

            $data = compact('albums', 'artists', 'playlists', 'tracks', 'radios', 'recents');
            return view('front.pages.music')->with('data', $data);
        }
        else
        {
            return $this->showLoginPage();
        }
    }

    public function showShows()
    {

        if($this->isLoggedIn())
        {
            dd($_REQUEST);
        }
        else
        {
            return $this->showLoginPage();
        }
    }

    public function showExploration()
    {
        if($this->isLoggedIn())
        {
            dd($_REQUEST);
        }
        else
        {
            return $this->showLoginPage();
        }
    }

    public function showFavourites()
    {
        if($this->isLoggedIn())
        {
            dd($_REQUEST);
        }
        else
        {
            return $this->showLoginPage();
        }
    }

    public function showSearchs()
    {
        if($this->isLoggedIn())
        {
            dd($_REQUEST);
        }
        else
        {
            return $this->showLoginPage();
        }
    }

    public function performSearch(Request $request)
    {
        if($this->isLoggedIn())
        {
            dd($_REQUEST);
        }
        else
        {
            return $this->showLoginPage();
        }
    }

    /*  */

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
