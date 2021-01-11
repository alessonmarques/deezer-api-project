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

    <div class="container d-flex">
        <div class="row">
                <div>
                    <img src="{{ $user->picture }}" title="@{{ $user->name }} profile picture">
                    <span>{{ $user->firstname }} {{ $user->lastname }}</span>
                </div>
                {{-- <div>
                    Logout
                </div> --}}
        </div>
    </div>
@stop

@section('foot-private')
@stop
