<div>
    <!-- Carrusel de imágenes -->
    <div x-data="{ currentIndex: 0 }" class="relative" data-images-count="{{ count($images) }}">
        <!-- Contenedor del carrusel -->
        <div class="relative overflow-hidden rounded-lg shadow-lg">
            <div class="flex transition-transform duration-300 ease-in-out">
                @if (count($images) > 0)
                    @foreach ($images as $index => $image)
                        <div class="w-full flex-shrink-0" wire:key="image-{{ $index }}">
                            <img src="{{ asset('storage/' . $image) }}" alt="Imagen del servicio" width="256">
                            @role('admin')
                            <button class="relative top-2 right-2 sm-red-500 text-black p-1 rounded-full hover:sm-red-600" wire:click="deleteImage({{ $index }})">
                                <small>Eliminar</small>
                            </button>
                            @endrole
                        </div>
                    @endforeach
                @else
                    <div class="w-full flex-shrink-0">
                        <p class="text-center py-10 text-gray-600">No hay imágenes disponibles para este servicio.</p>
                    </div>
                @endif
            </div>
        </div>

    </div>

    <!-- Formulario para subir imágenes -->
    <div class="mt-4">
        <form wire:submit.prevent="uploadImages">
            <input type="file" wire:model="uploadedImages" multiple class="mb-2">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-black rounded-md hover:bg-blue-700">
                Subir Imágenes
            </button>
        </form>
    </div>
</div>