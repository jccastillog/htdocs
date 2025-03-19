@extends('layouts.base')

@section('header', 'Servicios')

@section('content')
    @role('admin')
    <a href="{{ route('service.create') }}"
        class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-black uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">Crear
        Servicio</a>
    @endrole
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 shadow-sm rounded-lg overflow-hidden">
            <thead class="bg-gray-50">
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Servicio</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripcion</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prestador</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo de Servicio</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Editar</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Borrar</th>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($services as $service)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <a class="text-red-600" href="{{ route('service.show', $service->id) }}">{{ $service->name }}</a></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $service->description }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $service->status }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $service->provider->type_legal_id . '-' . $service->provider->legal_id . ' ' . $service->provider->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $service->serviceType->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><a
                                href="{{ route('service.edit', $service->id) }}">Editar</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <form action="{{ route('service.destroy', $service->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Borrar">
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">No hay servicios para mostrar</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">
            {{ $services->links() }}
        </div>
    </div>
@endsection
