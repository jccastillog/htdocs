@extends('layouts.base')

@section('header', 'Servicio Detallado')

@section('content')
    <a href="{{ route('service.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-black uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">Volver</a>

    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <!-- Cabecera -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Detalle del Servicio</h1>
        </div>

        <!-- Contenido principal -->
        <div class="space-y-4">
            <h2 class="text-2xl font-semibold text-gray-800">{{ $service->name }}</h2>
            <p class="text-gray-700"><strong class="font-medium">Tipo de Servicio:</strong> {{ $service->serviceType->name}}</p>
            <p class="text-gray-700"><strong class="font-medium">Descripción:</strong> {{ $service->description }}</p>
            <p class="text-gray-700"><strong class="font-medium">Prestador:</strong> {{ $service->provider->type_legal_id.'-'.$service->provider->legal_id.' '.$service->provider->name}}</p>
            <p class="text-gray-700">Email: <strong class="font-medium"><strong>{{$service->provider->email}} </strong></p>
            <p class="text-gray-700">Telefono: <strong class="font-medium"><strong> {{$service->provider->phone}}</strong></p>
            <p class="text-gray-700">Dirección: <strong class="font-medium"><strong> {{$service->provider->address}}</strong></p>
            <p class="text-gray-700"><strong class="font-medium">Coordenadas:</strong> Latitud: {{ $service->coordenadas['lat'] }}, Longitud: {{ $service->coordenadas['lng'] }}</p>

            <div class="w-full flex-shrink-0">
                <strong class="font-medium">Redes Sociales:</strong>
                <ul class="space-y-2">
                    @if ($service->provider->social_media)
                        @foreach ($service->provider->social_media as $network => $account)
                            <li class="flex items-center p-3 bg-gray-50 rounded-lg shadow-sm hover:bg-gray-100 transition-colors duration-150">
                                <strong class="font-medium">{{ ucfirst($network) }}:</strong>
                                <a class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-black uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150" href="{{ $account['account'] }}" target="_blank">{{ $account['account'] }}</a>
                            </li>
                        @endforeach
                    @else
                        <li>No se han registrado redes sociales.</li>
                    @endif
                </ul>
            </div>
            <br>
            <h3 class="text-xl font-semibold text-gray-900 mb-4 bg-gray-200">Imagenes</h3>
            <!-- Componente Livewire para el carrusel de imágenes -->
            @livewire('image-carousel', ['service' => $service])

            <!-- Mapa -->
            <div class="mt-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4 bg-gray-200">Ubicación del Servicio</h2>
                <div id="map" class="w-full h-48 bg-gray-200 rounded-lg">

                    <script src="https://cdn.jsdelivr.net/npm/ol@v7.3.0/dist/ol.js"></script>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            // Coordenadas del servicio
                            const lat = {{ $service->coordenadas['lat'] }};
                            const lng = {{ $service->coordenadas['lng'] }};
                
                            // Crear el mapa
                            const map = L.map('map').setView([lat, lng], 13); // Nivel de zoom 13
                
                            // Añadir una capa de mapa (usando OpenStreetMap)
                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '© OpenStreetMap contributors'
                            }).addTo(map);
                
                            // Añadir un marcador en las coordenadas del servicio
                            L.marker([lat, lng]).addTo(map)
                                .bindPopup('{{ $service->name }}') // Mostrar el nombre del servicio en el popup
                                .openPopup();
                        });
                    </script>
                </div>
            </div>

            <p class="text-gray-700"><strong class="font-medium">Estado:</strong> Activo</p>

        </div>

        <form action="{{ route('mailMe') }}" method="POST">
            @csrf
            <input type="hidden" name="service_id" value="{{ $service->id }}">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border rounded-md font-semibold text-black uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Enviar e-mail
            </button>
        </form>

        <!-- Pie de página -->
        <div class="footer">
            © 2025 GuavioTour. Todos los derechos reservados.
        </div>
    </div>
@endsection