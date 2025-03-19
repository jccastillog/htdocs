@extends('layouts.app')

@section('title', 'Prestador Detallado')

@section('content')
    <h1>Ver Prestador {{ $provider->name }}</h1>
    <a href="{{ route('provider.index') }}">Volver</a>
    <div class="container">
        <h1>Detalles del Prestador</h1>
        <div class="info-item">
            <strong>Nombre:</strong>
            <span>{{ $provider->name }}</span>
        </div>
        <div class="info-item">
            <strong>Email:</strong>
            <span>{{ $provider->email }}</span>
        </div>
        <div class="info-item">
            <strong>Teléfono:</strong>
            <span>{{ $provider->phone }}</span>
        </div>
        <div class="info-item">
            <strong>Dirección:</strong>
            <span>{{ $provider->address }}</span>
        </div>
        <div class="info-item">
            <strong>Estado:</strong>
            <span class="status {{ $provider->status ? 'active' : 'inactive' }}">
                {{ $provider->status ? 'Activo' : 'Inactivo' }}
            </span>
        </div>
        <div class="info-item">
            <strong>Puntaje:</strong>
            <span class="score">{{ $provider->score }}</span>
        </div>
        <div class="info-item">
            <strong>Redes Sociales:</strong>
            <ul class="social-media">
                @if ($provider->social_media)
                    @foreach ($provider->social_media as $network => $account)
                        <li>
                            <strong>{{ ucfirst($network) }}:</strong>
                            <a href="{{ $account['account'] }}" target="_blank">{{ $account['account'] }}</a>
                        </li>
                    @endforeach
                @else
                    <li>No se han registrado redes sociales.</li>
                @endif
            </ul>
            <strong>Servicios:</strong>
            <ul>
                @foreach ($provider->services as $service)
                    <li>{{ $service->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

