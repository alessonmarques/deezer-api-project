<?php
    use Illuminate\Support\Facades\Session;
    use App\Support\User;

?>
@extends('front.main')

@section('head-private')
@stop

@section('content')

    <div class="container d-flex">
        <div class="row">
            @if( !Session::has('user') )

                <a href="{{route('front.home.deezer.login')}}"
                    target="popup"
                    onclick="window.open('{{route('front.home.deezer.login')}}','popup','width=800,height=475'); return false;">
                    Login
                </a>
            @endif
        </div>
    </div>
@stop

@section('foot-private')
@stop
