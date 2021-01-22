<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use app\Support\Artist;
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

            if(date('Y-m-d H:i:s') >= $user->tokenDestroyTime) return false;

            return true;
        }
        return false;
    }

    public function showLoginPage()
    {
        return view('front.pages.login');
    }

    public function showHomePage()
    {
        if($this->isLoggedIn())
        {
            return redirect(route('front.home.deezer.music'));
        }
        else
        {
            return $this->showLoginPage();
        }
    }
    /* */
    public function showMusics()
    {
        if($this->isLoggedIn())
        {
            $user = Session::get('user');

            $albums     = $user->getRecommendations('albums');
            $artists    = $user->getRecommendations('artists');
            $playlists  = $user->getRecommendations('playlists');
            // $tracks     = $user->getRecommendations('tracks');
            $radios     = $user->getRecommendations('radios');

            $recents    = $user->getHistory();

            $data = compact('recents', /*'tracks',*/ 'artists', 'radios', 'albums', 'playlists');
            return view('front.pages.music')->with('data', $data);
        }
        else
        {
            return $this->showLoginPage();
        }
    }

    public function showPodcasts()
    {

        if($this->isLoggedIn())
        {
            $user = Session::get('user');

            $podcasts     = $user->getPodcasts();

            $data = compact('podcasts');
            return view('front.pages.show')->with('data', $data);
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

    /* */

    public function deezerPlay(Request $request)
    {
        if($this->isLoggedIn())
        {
            $app = Session::get('app');

            $app->track = new \stdClass();
            $app->track->type   = $request->type;
            $app->track->id     = $request->id;

            Session::put('app', $app);

            return redirect()->back();
        }
        else
        {
            return $this->showLoginPage();
        }
    }
}
