@extends('layouts.app')

@section('links')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
@endsection

@section('title', 'Servicio Detallado')

@section('content')
    <h1>Ver Servicio {{ $service->name }}</h1>
    <a href="{{ route('service.index') }}">Volver</a>
    <div class="container">
        <!-- Cabecera -->
        <div class="header">
            <h1>Detalle del Servicio</h1>
        </div>

        <!-- Contenido principal -->
        <div class="content">
            <h2>{{ $service->name }}</h2>
            <p><strong>Tipo de Servicio:</strong> {{ $service->serviceType->name}}</p>
            <p><strong>Descripción:</strong> {{ $service->description }}</p>
            <p><strong>Prestador:</strong> {{ $service->provider->type_legal_id.'-'.$service->provider->legal_id.' '.$service->provider->name}}</p>
            <p><strong>Coordenadas:</strong> Latitud: {{ $service->coordenadas['lat'] }}, Longitud:
                {{ $service->coordenadas['lng'] }}</p>
            <div class="container">
                <h1>Ubicación del Servicio</h1>
                <div id="map"></div>
            </div>

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
            <p><strong>Estado:</strong> Activo</p>
            <a href="{{ route('service.edit', $service->id) }}" class="btn">Editar Servicio</a>
        </div>

        <!-- Pie de página -->
        <div class="footer">
            © 2025 GuavioTour. Todos los derechos reservados.
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin="">
    </script>
    <script>
        let map; // Variable global para evitar duplicaciones

        document.addEventListener('DOMContentLoaded', () => {
            if (!map) { // Verifica si el mapa no ha sido inicializado
                const coordenadas = {
                    lat: {{ $service->coordenadas['lat'] }},
                    lng: {{ $service->coordenadas['lng'] }}
                };

                // Crear el mapa
                map = L.map('map').setView(coordenadas, 13);

                // Cargar mosaicos de OpenStreetMap
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; OpenStreetMap contributors'
                }).addTo(map);

                // Añadir marcador
                L.marker(coordenadas).addTo(map)
                    .bindPopup("Ubicación del servicio")
                    .openPopup();

                // Ajustar tamaño del mapa (si estaba oculto)
                setTimeout(() => {
                    map.invalidateSize();
                }, 500);
            }
        });
    </script>

@endsection
