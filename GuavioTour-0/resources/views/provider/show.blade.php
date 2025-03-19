@extends('layouts.base')

@section('header', 'Prestador Detallado')

@section('content')

    <a class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-black uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150" href="{{ route('provider.index') }}">Volver</a>
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md" class="container">
        <!-- Cabecera -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Detalle del Prestador</h1>
        </div>

        <div class="space-y-4">
            <div class="w-full flex-shrink-0">
                <strong class="font-medium">Nombre:</strong>
                <span class="text-gray-700">{{ $provider->name }}</span>
            </div>
            <div class="w-full flex-shrink-0">
                <strong class="font-medium">Email:</strong>
                <span class="text-gray-700">{{ $provider->email }}</span>
            </div>
            <div class="w-full flex-shrink-0">
                <strong class="font-medium">Teléfono:</strong>
                <span class="text-gray-700">{{ $provider->phone }}</span>
            </div>
            <div class="w-full flex-shrink-0">
                <strong class="font-medium">Dirección:</strong>
                <span class="text-gray-700">{{ $provider->address }}</span>
            </div>
            <div class="w-full flex-shrink-0">
                <strong class="font-medium">Estado:</strong>
                <span class="text-gray-700" {{ $provider->status ? 'active' : 'inactive' }}">
                    {{ $provider->status ? 'Activo' : 'Inactivo' }}
                </span>
            </div>
            <div class="w-full flex-shrink-0">
                <strong class="font-medium">Puntaje:</strong>
                <span class="text-gray-700">{{ $provider->score }}</span>
            </div>
            <div class="w-full flex-shrink-0">
                <strong class="font-medium">Redes Sociales:</strong>
                <ul class="space-y-2">
                    @if ($provider->social_media)
                        @foreach ($provider->social_media as $network => $account)
                            <li class="flex items-center p-3 bg-gray-50 rounded-lg shadow-sm hover:bg-gray-100 transition-colors duration-150">
                                <strong class="font-medium">{{ ucfirst($network) }}:</strong>
                                <a class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-black uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150" href="{{ $account['account'] }}" target="_blank">{{ $account['account'] }}</a>
                            </li>
                        @endforeach
                    @else
                        <li>No se han registrado redes sociales.</li>
                    @endif
                </ul>
                <strong class="font-medium">Servicios:</strong>
                <ul>
                    @foreach ($provider->services as $service)
                        <li class="flex items-center p-3 bg-gray-50 rounded-lg shadow-sm hover:bg-gray-100 transition-colors duration-150">{{ $service->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

