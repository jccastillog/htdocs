<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProviderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type_legal_id' => 'required|string|max:5',
            'legal_id' => 'required|string|max:50',
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:50',
            'address' => 'required|string|max:255',
            'social_media' => 'nullable|json',
            'status' => 'boolean',
            'score' => 'nullable|numeric|min:0|max:10',
        ];
    }
}
