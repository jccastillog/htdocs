<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;  //Cuando está en true, no se valida el usuario.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'description' => 'required|string',
            'coordenadas.lat' => 'required|numeric',
            'coordenadas.lng' => 'required|numeric',
            'images' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
