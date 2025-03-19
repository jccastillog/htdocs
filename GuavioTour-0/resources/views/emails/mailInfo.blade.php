<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Servicio</title>
</head>

<body>
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <!-- Cabecera -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Hola, {{ $userName }}</h1>
            <p class="text-gray-700">Aquí tienes los detalles del servicio:</p>
        </div>

        <!-- Contenido principal -->
        <div class="space-y-4">
            <h2 class="text-2xl font-semibold text-gray-800">{{ $service->name }}</h2>
            <p class="text-gray-700"><strong class="font-medium">Tipo de Servicio:</strong> {{ $service->serviceType->name }}</p>
            <p class="text-gray-700"><strong class="font-medium">Descripción:</strong> {{ $service->description }}</p>
            <p class="text-gray-700"><strong class="font-medium">Prestador:</strong> {{ $service->provider->type_legal_id . '-' . $service->provider->legal_id . ' ' . $service->provider->name }}</p>
            <p class="text-gray-700">Email: <strong class="font-medium">{{ $service->provider->email }}</strong></p>
            <p class="text-gray-700">Teléfono: <strong class="font-medium">{{ $service->provider->phone }}</strong></p>
            <p class="text-gray-700">Dirección: <strong class="font-medium">{{ $service->provider->address }}</strong></p>
            <p class="text-gray-700"><strong class="font-medium">Coordenadas:</strong> Latitud: {{ $service->coordenadas['lat'] }}, Longitud: {{ $service->coordenadas['lng'] }}</p>
            <br>
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
        </div>

        <!-- Pie de página -->
        <div class="footer">
            © 2025 GuavioTour. Todos los derechos reservados.
        </div>
    </div>
</body>

</html>