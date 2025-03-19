<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    @yield('styles') {{-- --Secciones opcionales que se usan en alguna vista que las requiera --}}
    @yield('links') {{-- --Secciones opcionales que se usan en alguna vista que las requiera --}}
</head>
<body>
    @include('_partials.menu')
    @yield('content')
    @yield('scripts') {{-- --Secciones opcionales que se usan en alguna vista que las requiera --}}
</body>
</html>


