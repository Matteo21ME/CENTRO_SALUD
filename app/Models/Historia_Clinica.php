<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historia_Clinica extends Model
{
    protected $table = 'historias_clinicas';

    protected $fillable = [
        'paciente_id',
        'medico_id',
        'fecha_registro',
        'diagnostico',
        'tratamiento',
        'recetas',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }
}
