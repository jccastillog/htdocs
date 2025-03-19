@extends('layouts.app')

@section('title','Editar Servicios')

@section('content')
    <h1>Editar Servicio</h1>
    <a href="{{route('service.index')}}">Volver</a>
    <form action="{{route('service.update',$service->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="name">Nombre del servicio</label>
        <input type="text" id="name" name="name" placeholder="Ejemplo: Tour a la montaña" value="{{$service->name}}">
        @error('name')
            <p>{{$message}}</p>
        @enderror

        <label for="description">Descripción del servicio</label>
        <textarea id="description" name="description" placeholder="Describe el servicio..." >{{$service->description}}</textarea>
        @error('description')
            <p>{{$message}}</p>
        @enderror

        <label for="lat">Latitud</label>
        <input type="text" id="lat" name="coordenadas[lat]" placeholder="Ejemplo: 4.657846" value="{{$service->coordenadas['lat']}}">
        @error('coordenadas.lat')
            <p>{{$message}}</p>
        @enderror

        <label for="lng">Longitud</label>
        <input type="text" id="lng" name="coordenadas[lng]" placeholder="Ejemplo: -74.093675" value="{{$service->coordenadas['lng']}}">
        @error('coordenadas.lng')
            <p>{{$message}}</p>
        @enderror

        <div id="carouselImages" class="carousel" data-bs-ride="carousel">
            <div class="carousel-inner">
                @if ($service->images && is_array(json_decode($service->images)))
                    @foreach (json_decode($service->images) as $index => $image)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/' . $image) }}" class="d-block w-100" alt="Imagen del servicio">
                        </div>
                    @endforeach
                @else
                    <div class="carousel-item active">
                        <p>No hay imágenes disponibles para este servicio.</p>
                    </div>
                @endif
            </div>
            <button class="carousel-controls" type="button" data-bs-target="#carouselImages" data-bs-slide="prev">
                <span class="carousel-control" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-controls" type="button" data-bs-target="#carouselImages" data-bs-slide="next">
                <span class="carousel-control" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>

        <label for="imagen">Nuevas Imágenes</label>
        <input type="file" id="images[]" name="images[]" multiple accept="image/*" value="">

        <label for="activo">Estado </label>
        <input type="checkbox" id="status" name="status" value="1" checked value="{{$service->status}}">

        <label for="service_type_id">Tipo de Servicio</label>
        <input type="number" id="service_type_id" name="service_type_id" value="{{$service->service_type_id}}">

        <button type="submit">Editar servicio</button>

    </form>
