<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use app\Support\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use app\Support\Deezer;
use app\Support\Editorial;
use app\Support\Genre;
use app\Support\Search;

class FrontController extends Controller
{

    public function showLoginPage()
    {
        return view('front.pages.login');
    }

    public function showHomePage()
    {

        return redirect(route('front.home.deezer.music'));
    }

    public function showMusics()
    {

        $user = Session::get('user');

        $albums     = $user->getRecommendations('albums');
        $artists    = $user->getRecommendations('artists');
        $playlists  = $user->getRecommendations('playlists');
        $tracks     = $user->getRecommendations('tracks');
        $radios     = $user->getRecommendations('radios');

        $flow       = $user->getFlow();
        $recents    = $user->getHistory();

        $data = compact('flow', 'recents', 'tracks', 'artists', 'radios', 'albums', 'playlists');
        return view('front.pages.music')->with('data', $data);
    }

    public function showPodcasts()
    {


        $user   = Session::get('user');
        $genre  = new Genre();

        $podcasts      = $user->getPodcasts();
        $genres        = $genre->getPodcasts(['limit' => 10]);

        $data = compact('podcasts', 'genres');

        return view('front.pages.show')->with('data', $data);
    }

    public function showExploration()
    {

        $genre      = new Genre();

        $radios      = $genre->getRadios(['limit' => 10]);
        $artists     = $genre->getArtists(['limit' => 10]);

        $data = compact('radios', 'artists');

        return view('front.pages.explore')->with('data', $data);
    }
    //
    public function showFavourites()
    {

        $genre      = new Genre();

        $radios      = $genre->getRadios(['limit' => 10]);

        $data = compact('radios');

        return view('Front.pages.favourite')->with('data', $data);
    }

    public function showFavouriteTracks()
    {

        $user   = Session::get('user');

        $tracks      = $user->getTracks();

        $data = compact('tracks');

        return view('Front.pages.favourite')->with('data', $data);
    }

    public function showFavouritePlaylists()
    {

        $user   = Session::get('user');

        $playlists      = $user->getPlaylists();

        $data = compact('playlists');

        return view('Front.pages.favourite')->with('data', $data);
    }

    public function showFavouriteAlbums()
    {

        $user   = Session::get('user');

        $albums      = $user->getAlbums();

        $data = compact('albums');

        return view('Front.pages.favourite')->with('data', $data);
    }

    public function showFavouriteArtists()
    {

        $user   = Session::get('user');

        $artists      = $user->getArtists();

        $data = compact('artists');

        return view('Front.pages.favourite')->with('data', $data);
    }

    public function showFavouritePodcasts()
    {

        $user   = Session::get('user');

        $podcasts      = $user->getPodcasts();

        $data = compact('podcasts');

        return view('Front.pages.favourite')->with('data', $data);
    }

    public function showListeningHistory()
    {

        $user   = Session::get('user');

        $listening_history      = $user->getHistory(0);

        $data = compact('listening_history');

        return view('Front.pages.favourite')->with('data', $data)->with('listedData', true);
    }

    public function performSearch(Request $request)
    {
        $query = isset($request->search_query) && !empty($request->search_query) ? $request->search_query : '';
        $parameters = ['q' => $query, 'limit' => 0];

        $search         = new Search();

        $broad_search   = $search->getBroad($parameters);

        $data = compact('broad_search');
        $data = array_filter($data);

        return view('Front.pages.search')->with('data', $data);

    }

    public function deezerPlay(Request $request)
    {

        $app = Session::get('app');

        $app->track = new \stdClass();
        $app->track->type   = $request->type;
        $app->track->id     = $request->id;

        Session::put('app', $app);

        return redirect()->back();
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
