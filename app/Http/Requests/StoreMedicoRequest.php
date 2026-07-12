<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMedicoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'especialidad_id'  => ['required', 'integer', 'exists:especialidades,id'],
            'cedula'           => ['required', 'string', 'max:10', 'unique:medicos,cedula'],
            'nombre'           => ['required', 'string', 'max:50'],
            'apellido'         => ['required', 'string', 'max:50'],
            'correo'           => ['required', 'email', 'max:100', 'unique:medicos,correo'],
        ];
    }

    public function messages(): array
    {
        return [
            'cedula.unique'           => 'Ya existe un médico registrado con esa cédula.',
            'correo.unique'           => 'Ya existe un médico registrado con ese correo.',
        ];
    }
}