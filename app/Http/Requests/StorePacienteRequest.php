<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePacienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cedula'           => ['required', 'string', 'max:10', 'unique:pacientes,cedula'],
            'nombre'           => ['required', 'string', 'max:50'],
            'apellido'         => ['required', 'string', 'max:50'],
            'fecha_nacimiento' => ['required', 'date', 'before:today'],
            'direccion'        => ['required', 'string', 'max:100'],
            'correo'           => ['required', 'email', 'max:100', 'unique:pacientes,correo'],
            'telefono'         => ['required', 'string', 'max:15'],
        ];
    }

    public function messages(): array
    {
        return [
            'cedula.unique'           => 'Ya existe un paciente registrado con esa cédula.',
            'correo.unique'           => 'Ya existe un paciente registrado con ese correo.',
            'fecha_nacimiento.before' => 'La fecha de nacimiento debe ser anterior a hoy.',
        ];
    }
}