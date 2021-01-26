<?php

    const MAX_CARATCTER_NAME = 30;
    const MAX_CARATCTER_NAME_START = 0;
    const MAX_CARATCTER_NAME_LIMIT = 27;

    const DEEZER_MINUTE_CALC = 61;

    $list_component = 'front.includes.components.grid_list';

    if(isset($listedData) && !empty($listedData)) $list_component = 'front.includes.components.list';
?>

@extends('Front.internal_page_layout')

@section('head-private')
@stop


@section('internal_content')
    @include('Front.includes.components.favourite_navigation_bar', [])
    <div class="text-white" >
        @foreach ($data as $type => $itens)
            @include($list_component, ['type' => $type, 'itens' => $itens->data])
        @endforeach
    </div>
@stop

@section('foot-private')
@stop
