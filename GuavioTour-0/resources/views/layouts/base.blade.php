<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map { height: 400px; width: 100%; }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>
<body>
    @include('_partials.messages')

    @livewire('navigation-menu')
    
    @yield('content')
    @yield('scripts') {{-- --Secciones opcionales que se usan en alguna vista que las requiera --}}

    @stack('modals')

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    @livewireScripts
</body>
</html>
