<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMedicoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('id');

        return [
            'especialidad_id'  => ['sometimes', 'required', 'integer', 'exists:especialidades,id'],
            'cedula'           => ['sometimes', 'required', 'string', 'max:10', "unique:medicos,cedula,{$id}"],
            'nombre'           => ['sometimes', 'required', 'string', 'max:50'],
            'apellido'         => ['sometimes', 'required', 'string', 'max:50'],
            'correo'           => ['sometimes', 'required', 'email', 'max:100', "unique:medicos,correo,{$id}"],
        ];
    }

    public function messages(): array
    {
        return [
            'cedula.unique' => 'Ya existe un médico registrado con esa cédula.',
            'correo.unique' => 'Ya existe un médico registrado con ese correo.',
        ];
    }
}