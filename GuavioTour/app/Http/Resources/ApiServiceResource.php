<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'service_id' => $this->service_id,
            'name' => $this->name,
            'description' => $this->description,
            'coordenadas' => $this->coordenadas,
            'images' => $this->images,
            'status' => $this->status,
            'provider' => $this->provider->type_legal_id.'-'.$this->provider->legal_id.' '.$this->provider->name,
            'service_type' => $this->serviceType->name,
            ];
    }
}
