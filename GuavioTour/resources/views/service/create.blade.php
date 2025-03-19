@extends('layouts.app')

@section('title','Crear Servicios')

@section('content')
    <h1>Crear Servicio</h1>
    <a href="{{route('service.index')}}">Volver</a>
    <form action="{{route('service.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Nombre del servicio</label>
        <input type="text" id="name" name="name" placeholder="Ejemplo: Tour a la montaña">
        @error('name')
            <p>{{$message}}</p>
        @enderror

        <label for="description">Descripción del servicio</label>
        <textarea id="description" name="description" placeholder="Describe el servicio..."></textarea>
        @error('description')
            <p>{{$message}}</p>
        @enderror

        <label for="lat">Latitud</label>
        <input type="text" id="lat" name="coordenadas[lat]" placeholder="Ejemplo: 4.657846">
        @error('coordenadas.lat')
            <p>{{$message}}</p>
        @enderror

        <label for="lng">Longitud</label>
        <input type="text" id="lng" name="coordenadas[lng]" placeholder="Ejemplo: -74.093675">
        @error('coordenadas.lng')
            <p>{{$message}}</p>
        @enderror

        <label for="imagen">Imágenes</label>
        <input type="file" id="images[]" name="images[]" multiple accept="image/*">

        <label for="activo">Estado</label>
        <input type="checkbox" id="status" name="status" value="1" checked>

        <label for="provider_id">Prestador</label>
        <input type="number" id="provider_id" name="provider_id">

        <label for="service_type_id">Tipo de Servicio</label>
        <input type="number" id="service_type_id" name="service_type_id">

        <button type="submit">Crear servicio</button>

    </form>
