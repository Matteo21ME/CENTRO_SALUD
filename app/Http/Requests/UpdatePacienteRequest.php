<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePacienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('id');

        return [
            'cedula'           => ['sometimes', 'required', 'string', 'max:10', "unique:pacientes,cedula,{$id}"],
            'nombre'           => ['sometimes', 'required', 'string', 'max:50'],
            'apellido'         => ['sometimes', 'required', 'string', 'max:50'],
            'fecha_nacimiento' => ['sometimes', 'required', 'date', 'before:today'],
            'direccion'        => ['sometimes', 'required', 'string', 'max:100'],
            'correo'           => ['sometimes', 'required', 'email', 'max:100', "unique:pacientes,correo,{$id}"],
            'telefono'         => ['sometimes', 'required', 'string', 'max:15'],
        ];
    }

    public function messages(): array
    {
        return [
            'cedula.unique' => 'Ya existe un paciente registrado con esa cédula.',
            'correo.unique' => 'Ya existe un paciente registrado con ese correo.',
            'fecha_nacimiento.before' => 'La fecha de nacimiento debe ser anterior a hoy.',
        ];
    }
}