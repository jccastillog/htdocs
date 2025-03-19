@extends('layouts.base')

@section('header', 'Crear Servicios')

@section('content')

    <a href="{{ route('service.index') }}"
        class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-black uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">Volver</a>

    <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data"
        class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md">
        @csrf
        <label for="name" class="block text-sm font-medium text-gray-700">Nombre del servicio</label>
        <input type="text" id="name" name="name" placeholder="Ejemplo: Tour a la montaña"
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
        @error('name')
            <p>{{ $message }}</p>
        @enderror

        <label for="description" class="block text-sm font-medium text-gray-700">Descripción del servicio</label>
        <textarea id="description" name="description" placeholder="Describe el servicio..."
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"></textarea>
        @error('description')
            <p>{{ $message }}</p>
        @enderror

        <label for="lat" class="block text-sm font-medium text-gray-700">Latitud</label>
        <input type="text" id="lat" name="coordenadas[lat]" placeholder="Ejemplo: 4.657846"
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
        @error('coordenadas.lat')
            <p>{{ $message }}</p>
        @enderror

        <label for="lng" class="block text-sm font-medium text-gray-700">Longitud</label>
        <input type="text" id="lng" name="coordenadas[lng]" placeholder="Ejemplo: -74.093675"
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
        @error('coordenadas.lng')
            <p>{{ $message }}</p>
        @enderror

        <label for="imagen" class="block text-sm font-medium text-gray-700">Imágenes</label>
        <input type="file" id="images" name="images[]" multiple accept="image/*">

        <label for="activo" class="block text-sm font-medium text-gray-700">Estado</label>

        <x-checkbox id="status" name="status" value="1" checked>  </x-checkbox>

        <label for="provider_id" class="block text-sm font-medium text-gray-700">Prestador</label>
        <input type="number" id="provider_id" name="provider_id"
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">

        <label for="service_type_id" class="block text-sm font-medium text-gray-700">Tipo de Servicio</label>
        <input type="number" id="service_type_id" name="service_type_id"
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">

        <x-button>
            Crear servicio
        </x-button>



    </form>
@endsection
