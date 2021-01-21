<?php

?>

@extends('Front.internal_page_layout')

@section('head-private')
@stop


@section('internal_content')
    <div class="text-white" >
        @foreach ($data as $type => $itens)
            @include('front.includes.components.grid_list', ['type' => $type, 'itens' => $itens->data])
        @endforeach
    </div>
@stop

@section('foot-private')
@stop

