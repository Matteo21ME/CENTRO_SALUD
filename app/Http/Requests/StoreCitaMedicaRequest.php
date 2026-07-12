<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCitaMedicaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'medico_id'      => ['required', 'integer', 'exists:medicos,id'],
            'paciente_id'    => ['required', 'integer', 'exists:pacientes,id'],
            'consultorio_id' => ['required', 'integer', 'exists:consultorios,id'],
            'Dia_Semana'     => ['required', 'string', 'in:Lunes,Martes,Miércoles,Jueves,Viernes'],
            'hora'           => ['required', 'date_format:H:i:s'],
            'motivo'         => ['required', 'string', 'max:255'],
            'estado'         => ['required', 'string', 'in:PROGRAMADA,ATENDIDA,CANCELADA'],
        ];
    }

    public function messages(): array
    {
        return [
            'consultorio_id.unique' => 'Ya existe una cita médica registrada con ese consultorio.',
            'Dia_Semana.required' => 'El día de la semana es obligatorio.',
            'hora.required' => 'La hora es obligatoria.',
            'motivo.required' => 'El motivo es obligatorio.',
            'estado.required' => 'El estado es obligatorio.',
        ];
    }
}