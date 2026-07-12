<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreConsultorioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('id');

        return [
            'piso'             => ['required', 'string', 'max:50'],
            'estado'           => ['required', 'string', 'max:50'],
            'direccion'        => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'piso.required' => 'El piso es obligatorio.',
            'estado.required' => 'El estado es obligatorio.',
            'direccion.required' => 'La dirección es obligatoria.',
        ];
    }
}