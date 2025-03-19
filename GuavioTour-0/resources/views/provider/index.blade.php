@extends('layouts.base')

@section('header', 'Prestadores')


@section('content')
    <a href="{{ route('provider.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-black uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">Crear Prestador</a>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 shadow-sm rounded-lg overflow-hidden">
            <thead class="bg-gray-50">
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre / Razón Social</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Identificación</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Teléfono</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dirección</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Calificación</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Editar</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Borrar</th>
            </thead>
            <tbody>
                @forelse ($providers as $provider)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <a href="{{ route('provider.show', $provider->id) }}">{{ $provider->name }}</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $provider->type_legal_id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $provider->legal_id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $provider->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $provider->phone }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $provider->address }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $provider->status }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $provider->score }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><a href="{{ route('provider.edit', $provider->id) }}">Editar</a></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
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
        <div class="mt-4">
            {{ $providers->links() }}
        </div>
    </div>
@endsection
