<?php
    $user = Session::get('user');
?>


    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>deezer-api-project</title>
        <link rel="stylesheet" href="{{ url(mix('front/css/reset.css')) }}">
        <link rel="stylesheet" href="{{ url(mix('front/css/app.css')) }}">
        <link rel="stylesheet" href="{{ url(mix('front/css/sb_admin.css')) }}">
        <link rel="stylesheet" href="{{ url(mix('front/css/swal.css')) }}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

        @yield('head-private')
    </head>
    <body class="sb-nav-fixed bg-light-dark">
        <div class="clientMessage"></div>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand text-front text-center" href="{{route('front.home')}}">deezer-api-project</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Space-->
            <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></div>

            {{-- <div class="row pt-2 px-5 input-group input-group-lg">
                <input class="form-control form-control-dark w-90 bg-dark text-white" type="text" placeholder="Search" aria-label="Search">
                <button type="submit" class="btn btn-light">
                    Search
                </button>
            </div> --}}

            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw text-front"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{route('front.home.deezer.logout')}}">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-footer d-flex justify-content-center">
                        <div class="d-block">
                            <div class="row d-flex justify-content-center">
                                <img src="{{ $user->picture }}" title="{{'@'. $user->name }} profile picture"  width="120px" style="border: 2px solid #dee3ec; border-radius: 50%">
                            </div>
                            <div class="row d-flex justify-content-center">
                                <span class="text-white my-2">
                                    <a href="{{ route('front.home') }}">
                                        <button type="button" class="btn btn-dark font-weight-bold">

                                            {{ $user->firstname }} {{ $user->lastname }}
                                        </button>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">MENU</div>
                            <a class="nav-link" href="{{route('front.home.deezer.music')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-music"></i></div>
                                <span class="font-weight-bold">Musics</span>
                            </a>
                            <a class="nav-link" href="{{route('front.home.deezer.show')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-microphone-alt"></i></div>
                                <span class="font-weight-bold">Shows</span>
                            </a>
                            <a class="nav-link" href="{{route('front.home.deezer.explore')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-th-large"></i></div>
                                <span class="font-weight-bold">Explore</span>
                            </a>
                            <a class="nav-link" href="{{route('front.home.deezer.favourite')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-heart"></i></div>
                                <span class="font-weight-bold">Favourites</span>
                            </a>
                            <div class="small pl-4">
                                <a class="nav-link" href="{{route('front.home.deezer.favourite.favourite_tracks')}}">
                                    Favourite tracks
                                </a>
                                <a class="nav-link" href="{{route('front.home.deezer.favourite.playlists')}}">
                                    Playlists
                                </a>
                                <a class="nav-link" href="{{route('front.home.deezer.favourite.albums')}}">
                                    Albums
                                </a>
                                <a class="nav-link" href="{{route('front.home.deezer.favourite.artists')}}">
                                    Artists
                                </a>
                                <a class="nav-link" href="{{route('front.home.deezer.favourite.podcasts')}}">
                                    Podcasts
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">
                            @include('Front.includes.components.player')
                        </div>
                    </div>
                </nav>
            </div>

