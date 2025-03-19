@extends('layouts.landing')

@section('title','Services')

@section('content')
    <h1>Vista Services</h1>
    @component('_components.card')
        @slot('title','Servicio 1')
        @slot('content')
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptates.
        @endslot
    @endcomponent
    @component('_components.card')
        @slot('title','Servicio 2')
        @slot('content')
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptates.
        @endslot
    @endcomponent
    @component('_components.card')
        @slot('title','Servicio 3')
        @slot('content')
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptates.
        @endslot
    @endcomponent
    @component('_components.card')
        @slot('title','Servicio 4')
        @slot('content')
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptates.
        @endslot
    @endcomponent
@endsection
