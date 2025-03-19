@extends('layouts.base')

@section('header', 'Crear Prestadores')

@section('content')

    <div class="form-container">

        <a href="{{route('provider.index')}}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-black uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">Volver</a>

        <form action="{{ route('provider.store') }}" method="POST" class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md">
            @csrf
            <!-- Tipo de identificación legal -->
            <label for="type_legal_id" class="block text-sm font-medium text-gray-700">Tipo de ID Legal</label>
            <select name="type_legal_id" id="type_legal_id" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                <option value="NIT">NIT</option>
                <option value="CC">CC</option>
                <option value="CE">CE</option>
            </select>

            <!-- Número de identificación -->
            <label for="legal_id" class="block text-sm font-medium text-gray-700">ID Legal</label>
            <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out" type="text" name="legal_id" id="legal_id" required placeholder="Ingrese el número de identificación">
            @error('legal_id')
                <p>{{$message}}</p>
            @enderror

            <!-- Nombre -->
            <label for="name" class="block text-sm font-medium text-gray-700">Nombre / Razón Social</label>
            <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out" type="text" name="name" id="name" required placeholder="Ingrese el nombre del Prestador">
            @error('name')
                <p>{{$message}}</p>
            @enderror

            <!-- Correo electrónico -->
            <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
            <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out" type="email" name="email" id="email" required placeholder="ejemplo@dominio.com">
            @error('email')
                <p>{{$message}}</p>
            @enderror

            <!-- Teléfono -->
            <label for="phone" class="block text-sm font-medium text-gray-700">Teléfono</label>
            <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out" type="tel" name="phone" id="phone" required placeholder="Ingrese el número de teléfono">
            @error('phone')
                <p>{{$message}}</p>
            @enderror

            <!-- Dirección -->
            <label for="address" class="block text-sm font-medium text-gray-700">Dirección</label>
            <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out" type="text" name="address" id="address" required placeholder="Ingrese la dirección">
            @error('address')
                <p>{{$message}}</p>
            @enderror

            <!-- Redes Sociales -->
            <label for="social_media" class="block text-sm font-medium text-gray-700">Redes Sociales</label>
            <div id="social_media">
                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        Facebook
                        <input type="checkbox" name="social_media[facebook][enabled]" value="1" onchange="toggleInput(this, 'facebook')">
                    </label>
                    <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out" type="text" name="social_media[facebook][account]" id="facebook" placeholder="Cuenta o enlace de Facebook" disabled>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        Twitter
                        <input type="checkbox" name="social_media[twitter][enabled]" value="1" onchange="toggleInput(this, 'twitter')">
                    </label>
                    <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out" type="text" name="social_media[twitter][account]" id="twitter" placeholder="Cuenta o enlace de Twitter" disabled>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        Instagram
                        <input type="checkbox" name="social_media[instagram][enabled]" value="1" onchange="toggleInput(this, 'instagram')">
                    </label>
                    <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out" type="text" name="social_media[instagram][account]" id="instagram" placeholder="Cuenta o enlace de Instagram" disabled>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        LinkedIn
                        <input type="checkbox" name="social_media[linkedin][enabled]" value="1" onchange="toggleInput(this, 'linkedin')">
                    </label>
                    <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out" type="text" name="social_media[linkedin][account]" id="linkedin" placeholder="Cuenta o enlace de LinkedIn" disabled>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        YouTube
                        <input type="checkbox" name="social_media[youtube][enabled]" value="1" onchange="toggleInput(this, 'youtube')">
                    </label>
                    <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out" type="text" name="social_media[youtube][account]" id="youtube" placeholder="Cuenta o enlace de YouTube" disabled>
                </div>
            </div>


            <!-- Estado -->
            <label for="status" class="block text-sm font-medium text-gray-700">
                Estado
                <input type="checkbox" name="status" id="status" value=1 checked>
            </label>

            <!-- Puntaje -->
            <label for="score" class="block text-sm font-medium text-gray-700">Puntaje</label>
            <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out" type="number" name="score" id="score" step="0.01" min="0" max="10" placeholder="Ingrese un puntaje del 0 al 10" >

            <button type="submit" class="w-full px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-black uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">Crear Prestador</button>
        </form>
    </div>

@endsection

@section('scripts')
<script>
    function toggleInput(checkbox, inputId) {
        const input = document.getElementById(inputId);
        input.disabled = !checkbox.checked;
        if (!checkbox.checked) {
            input.value = ''; // Limpia el valor si se desactiva el checkbox
        }
    }
</script>
@endsection
