<?php
    use Illuminate\Support\Facades\Session;
    use app\Support\User;

?>
@extends('Front.internal_page_layout')

@section('head-private')
@stop


@section('internal_content')
    <div class="row pt-2 px-2">



        <pre class="text-white">  {{-- remove after debuging --}}


        @foreach ($data as $key => $value)
            <h3>{{ $key }}</h3>
            {{ print_r($value) }}
        @endforeach


        <pre> {{-- remove after debuging --}}



    </div>
@stop

@section('foot-private')
@stop

