@extends('Front.internal_page_layout')

@section('head-private')
@stop

@section('internal_content')
    <div class="text-white" >
        @forelse ($data as $type => $itens)
            @include('front.includes.components.list', ['type' => $type, 'itens' => $itens->data])
        @empty
            <div>
                <h5 class="m-2">No registers found.</h5>
            </div>
        @endforelse
    </div>
@stop

@section('foot-private')
@stop
