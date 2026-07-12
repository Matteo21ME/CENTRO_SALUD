<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita_Medica extends Model
{
    protected $table = 'citas_medicas';

    protected $fillable = [
        'medico_id',
        'paciente_id',
        'consultorio_id',
        'Dia_Semana',
        'hora',
        'motivo',
        'estado',
    ];

    public function consultorio()
    {
        return $this->belongsTo(Consultorio::class);
    }

    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
