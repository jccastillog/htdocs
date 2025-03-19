<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Service; 
use Illuminate\Support\Facades\Storage;

class ImageCarousel extends Component
{
    use WithFileUploads;

    public $service;
    public $images = [];
    public $uploadedImages = [];

    public function mount(Service $service)
    {
        $this->service = $service;
        if (is_string($service->images)) {
            $this->images = json_decode($service->images, true) ?? [];
        } else {
            $this->images = $service->images ?? [];
        }
    }

    public function uploadImages()
    {
        $this->validate([
            'uploadedImages.*' => 'image|mimes:jpeg,png,jpg,gif|max:40800', 
        ]);

        foreach ($this->uploadedImages as $image) {
            $path = $image->store('services', 'public');
            $this->images[] = $path;
        }

        $this->service->update(['images' => json_encode($this->images)]);
        $this->uploadedImages = []; 

    }

    public function deleteImage($index)
    {
        if (isset($this->images[$index])) {
            // Eliminar la imagen del servidor (opcional)
            if (Storage::disk('public')->exists($this->images[$index])) {
                Storage::disk('public')->delete($this->images[$index]);
            }

            // Eliminar la imagen del array
            unset($this->images[$index]);
            $this->images = array_values($this->images); // Reindexar el array

            // Actualizar la base de datos
            $this->service->update(['images' => json_encode($this->images)]);

        }
    }

    public function render()
    {
        return view('livewire.image-carousel');
    }
}