@extends('layouts.app')

@section('title', 'Prestadores')


@section('content')
    <h1>Prestadores</h1>
    <a href="{{ route('provider.create') }}">Crear Prestador</a>
    <table>
        <thead>
            <th>Nombre / Razón Social</th>
            <th>Tipo</th>
            <th>Identificación</th>
            <th>email</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Estado</th>
            <th>Calificación</th>
            <th>Editar</th>
            <th>Borrar</th>
        </thead>
        <tbody>
            @forelse ($providers as $provider)
                <tr>
                    <td><a href="{{ route('provider.show', $provider->id) }}">{{ $provider->name }}</a></td>
                    <td>{{ $provider->type_legal_id }}</td>
                    <td>{{ $provider->legal_id }}</td>
                    <td>{{ $provider->email }}</td>
                    <td>{{ $provider->phone }}</td>
                    <td>{{ $provider->address }}</td>
                    <td>{{ $provider->status }}</td>
                    <td>{{ $provider->score }}</td>
                    <td><a href="{{ route('provider.edit', $provider->id) }}">Editar</a></td>
                    <td>
                        <form action="{{ route('provider.destroy', $provider->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Borrar">
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td>No hay prestadores para mostrar</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
