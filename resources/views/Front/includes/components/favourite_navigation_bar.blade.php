<?php
    $requested_url  = explode('/', $_SERVER['REQUEST_URI']);
    $active_menu    = array_pop($requested_url);

    $menu_itens     = [
        [   'name' => 'Highlights',
            'anchor_tag' => 'favourite',
            'href' => route('front.home.deezer.favourite')],

        [   'name' => 'Favourite tracks',
            'anchor_tag' => 'favourite_tracks',
            'href' => route('front.home.deezer.favourite.favourite_tracks')],

        [   'name' => 'Playlists',
            'anchor_tag' => 'playlists',
            'href' => route('front.home.deezer.favourite.playlists')],

        [   'name' => 'Albums',
            'anchor_tag' => 'albums',
            'href' => route('front.home.deezer.favourite.albums')],

        [   'name' => 'Artists',
            'anchor_tag' => 'artists',
            'href' => route('front.home.deezer.favourite.artists')],

        [   'name' => 'Podcasts',
            'anchor_tag' => 'podcasts',
            'href' => route('front.home.deezer.favourite.podcasts')],

        [   'name' => 'Listening History',
            'anchor_tag' => 'listening_history',
            'href' => route('front.home.deezer.favourite.listening_history')],

        [   'name' => 'Mixes',
            'anchor_tag' => 'mixes',
            'href' => route('front.home.deezer.favourite.mixes')],

        [   'name' => 'My MP3s',
            'anchor_tag' => 'mp3',
            'href' => route('front.home.deezer.favourite.mp3')],

        [   'name' => 'Following',
            'anchor_tag' => 'following',
            'href' => route('front.home.deezer.favourite.following')],

        [   'name' => 'Followers',
            'anchor_tag' => 'followers',
            'href' => route('front.home.deezer.favourite.followers')],
    ];

?>

<nav class=" mt-5 pt-2 px-2 navbar navbar-expand-lg navbar-dark bg-light-dark">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            @foreach ($menu_itens as $menu_item)
                <li class="nav-item pr-5">
                    <a class="nav-link {{ $menu_item['anchor_tag'] == $active_menu ? 'active' : '' }}" href="{{ $menu_item['href'] }}" >{{ $menu_item['name'] }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>
<hr>
