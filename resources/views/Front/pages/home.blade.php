<?php
    use Illuminate\Support\Facades\Session;
    use app\Support\User;

    $user = Session::get('user');

?>
@extends('front.main')

@section('head-private')
@stop

@section('content')
    <div id="layoutSidenav_content">
        <div class="container">
            <div class="row">
                {{-- <div class="card mt-2">
                    <span class="text-dark mb-2">{{ $user->firstname }} {{ $user->lastname }}</span>
                    <img src="{{ $user->picture }}" title="{{'@'.$user->name }} profile picture" class="" width="150px" style="border-radius: 30%">
                    <a href="{{route('front.home.deezer.logout')}}" class="my-2" target="_self">
                        Logout
                    </a>
                </div> --}}


            </div>
        </div>
    </div>
@stop

@section('foot-private')
@stop
