{{-- @extends('layouts.app') --}}

@section('title', 'Servicios')


@section('content')
    <h1>Servicios</h1>
    <a href="{{ route('service.create') }}">Crear Servicio</a>
    <table>
        <thead>
            <th>Servicio</th>
            <th>Descripcion</th>
            <th>Estado</th>
            <th>Prestador</th>
            <th>Tipo de Servicio</th>
            <th>Editar</th>
            <th>Borrar</th>
        </thead>
        <tbody>
            @forelse ($services as $service)
                <tr>
                    <td><a href="{{ route('service.show', $service->id) }}">{{ $service->name }}</a></td>
                    <td>{{ $service->description }}</td>
                    <td>{{ $service->status }}</td>
                    <td>{{ $service->provider->type_legal_id.'-'.$service->provider->legal_id.' '.$service->provider->name}}</td>
                    <td>{{ $service->serviceType->name}}</td>
                    <td><a href="{{ route('service.edit', $service->id) }}">Editar</a></td>
                    <td>
                        <form action="{{ route('service.destroy', $service->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Borrar">
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td>No hay servicios para mostrar</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
