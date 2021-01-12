<?php
    use Illuminate\Support\Facades\Session;
    use App\Support\User;

    $user = Session::get('user');

    // echo "<pre>";
    // print_r($user);
    // echo "</pre>";

?>
@extends('front.main')

@section('head-private')
@stop

@section('content')
    <div class="container">
        {{-- <div >
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#">Navbar</a>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                </div>
            </nav>
        </div> --}}
        <div class="row">
            <div class="container ">
                <div class="row">
                        <div class="card mt-2">
                            <span class="text-dark mb-2">{{ $user->firstname }} {{ $user->lastname }}</span>
                            <img src="{{ $user->picture }}" title="@{{ $user->name }} profile picture" class="" width="150px" style="border-radius: 30%">
                            <a href="{{route('front.home.deezer.logout')}}" class="my-2" target="_self">
                                Logout
                            </a>

                        </div>

                </div>
            </div>
        </div>
    </div>

@stop

@section('foot-private')
@stop
