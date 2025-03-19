@extends('layouts.app')

@section('title', 'Crear Prestadores')

@section('content')

    <div class="form-container">
        <h2>Crear Prestador</h2>
        <a href="{{route('provider.index')}}">Volver</a>
        <form action="{{ route('provider.store') }}" method="POST">
            @csrf
            <!-- Tipo de identificación legal -->
            <label for="type_legal_id">Tipo de ID Legal</label>
            <select name="type_legal_id" id="type_legal_id" required>
                <option value="NIT">NIT</option>
                <option value="CC">CC</option>
                <option value="CE">CE</option>
            </select>

            <!-- Número de identificación -->
            <label for="legal_id">ID Legal</label>
            <input type="text" name="legal_id" id="legal_id" required placeholder="Ingrese el número de identificación">
            @error('legal_id')
                <p>{{$message}}</p>
            @enderror

            <!-- Nombre -->
            <label for="name">Nombre / Razón Social</label>
            <input type="text" name="name" id="name" required placeholder="Ingrese el nombre del Prestador">
            @error('name')
                <p>{{$message}}</p>
            @enderror

            <!-- Correo electrónico -->
            <label for="email">Correo Electrónico</label>
            <input type="email" name="email" id="email" required placeholder="ejemplo@dominio.com">
            @error('email')
                <p>{{$message}}</p>
            @enderror

            <!-- Teléfono -->
            <label for="phone">Teléfono</label>
            <input type="tel" name="phone" id="phone" required placeholder="Ingrese el número de teléfono">
            @error('phone')
                <p>{{$message}}</p>
            @enderror

            <!-- Dirección -->
            <label for="address">Dirección</label>
            <input type="text" name="address" id="address" required placeholder="Ingrese la dirección">
            @error('address')
                <p>{{$message}}</p>
            @enderror

            <!-- Redes Sociales -->
            <label for="social_media">Redes Sociales</label>
            <div id="social_media">
                <div>
                    <label>
                        Facebook
                        <input type="checkbox" name="social_media[facebook][enabled]" value="1" onchange="toggleInput(this, 'facebook')">
                    </label>
                    <input type="text" name="social_media[facebook][account]" id="facebook" placeholder="Cuenta o enlace de Facebook" disabled>
                </div>
                <div>
                    <label>
                        Twitter
                        <input type="checkbox" name="social_media[twitter][enabled]" value="1" onchange="toggleInput(this, 'twitter')">
                    </label>
                    <input type="text" name="social_media[twitter][account]" id="twitter" placeholder="Cuenta o enlace de Twitter" disabled>
                </div>
                <div>
                    <label>
                        Instagram
                        <input type="checkbox" name="social_media[instagram][enabled]" value="1" onchange="toggleInput(this, 'instagram')">
                    </label>
                    <input type="text" name="social_media[instagram][account]" id="instagram" placeholder="Cuenta o enlace de Instagram" disabled>
                </div>
                <div>
                    <label>
                        LinkedIn
                        <input type="checkbox" name="social_media[linkedin][enabled]" value="1" onchange="toggleInput(this, 'linkedin')">
                    </label>
                    <input type="text" name="social_media[linkedin][account]" id="linkedin" placeholder="Cuenta o enlace de LinkedIn" disabled>
                </div>
                <div>
                    <label>
                        YouTube
                        <input type="checkbox" name="social_media[youtube][enabled]" value="1" onchange="toggleInput(this, 'youtube')">
                    </label>
                    <input type="text" name="social_media[youtube][account]" id="youtube" placeholder="Cuenta o enlace de YouTube" disabled>
                </div>
            </div>


            <!-- Estado -->
            <label for="status">
                Estado
                <input type="checkbox" name="status" id="status" value=1 checked>
            </label>

            <!-- Puntaje -->
            <label for="score">Puntaje</label>
            <input type="number" name="score" id="score" step="0.01" min="0" max="10" placeholder="Ingrese un puntaje del 0 al 10" >

            <button type="submit">Crear Prestador</button>
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
