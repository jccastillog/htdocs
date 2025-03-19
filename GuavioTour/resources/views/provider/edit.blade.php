@extends('layouts.app')

@section('title', 'Editar Servicios')

@section('content')
    <h1>Editar Prestador</h1>
    <a href="{{ route('provider.index') }}">Volver</a>
    <form action="{{ route('provider.update', $provider->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Tipo de identificación legal -->
        <label for="type_legal_id">Tipo de ID Legal</label>
        <select name="type_legal_id" id="type_legal_id" required>
            <option value="NIT" {{ $provider->type_legal_id == 'NIT' ? 'selected' : '' }}>NIT</option>
            <option value="CC" {{ $provider->type_legal_id == 'CC' ? 'selected' : '' }}>CC</option>
            <option value="CE" {{ $provider->type_legal_id == 'CE' ? 'selected' : '' }}>CE</option>
        </select>

        <!-- Número de identificación -->
        <label for="legal_id">ID Legal</label>
        <input type="text" name="legal_id" id="legal_id" required placeholder="Ingrese el número de identificación"
            value="{{ $provider->legal_id }}">
        @error('legal_id')
            <p>{{ $message }}</p>
        @enderror

        <!-- Nombre -->
        <label for="name">Nombre / Razón Social</label>
        <input type="text" name="name" id="name" required placeholder="Ingrese el nombre del Prestador"
            value="{{ $provider->name }}">
        @error('name')
            <p>{{ $message }}</p>
        @enderror

        <!-- Correo electrónico -->
        <label for="email">Correo Electrónico</label>
        <input type="email" name="email" id="email" required placeholder="ejemplo@dominio.com"
            value="{{ $provider->email }}">
        @error('email')
            <p>{{ $message }}</p>
        @enderror

        <!-- Teléfono -->
        <label for="phone">Teléfono</label>
        <input type="tel" name="phone" id="phone" required placeholder="Ingrese el número de teléfono"
            value="{{ $provider->phone }}">
        @error('phone')
            <p>{{ $message }}</p>
        @enderror

        <!-- Dirección -->
        <label for="address">Dirección</label>
        <input type="text" name="address" id="address" required placeholder="Ingrese la dirección"
            value="{{ $provider->address }}">
        @error('address')
            <p>{{ $message }}</p>
        @enderror

        <!-- Redes Sociales -->
        @php
            $socialMedia = $provider->social_media ?? [];
        @endphp

        @foreach (['facebook', 'twitter', 'instagram', 'linkedin', 'youtube'] as $network)
            <div>
                <label>
                    <input type="checkbox" name="social_media[{{ $network }}][enabled]" value="1"
                        onchange="toggleInput(this, '{{ $network }}')"
                        {{ isset($socialMedia[$network]) ? 'checked' : '' }}>
                    {{ $network }}
                </label>
                <input type="text" name="social_media[{{ $network }}][account]" id="{{ $network }}"
                    placeholder="Cuenta o enlace de {{ $network }}" value="{{ $socialMedia[$network]['account'] ?? '' }}"
                    {{ isset($socialMedia[$network]) ? '' : 'disabled' }}>
            </div>
        @endforeach

        <!-- Estado -->
        <label for="status">
            Estado
            <input type="checkbox" name="status" id="status" value=1 checked value="{{ $provider->status }}">
        </label>

        <!-- Puntaje -->
        <label for="score">Puntaje</label>
        <input type="number" name="score" id="score" step="0.01" min="0" max="10"
            placeholder="Ingrese un puntaje del 0 al 10" value="{{ $provider->score }}">

        <button type="submit">Editar Prestador</button>

    </form>
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
