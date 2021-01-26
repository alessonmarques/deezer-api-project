@extends('front.main')

@section('content')
    <div id="layoutSidenav_content">
        <div class="container-fluid">
            @include('front.includes.components.search')
            @yield('internal_content')
        </div>
    </div>

@stop
