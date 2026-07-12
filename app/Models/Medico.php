<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $fillable = [
        'especialidad_id',
        'cedula',
        'nombre',
        'apellido',
        'correo',
    ];

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class);
    }

    public function citasMedicas()
    {
        return $this->hasMany(Cita_Medica::class);
    }

    public function turnos()
    {
        return $this->hasMany(Turno::class);
    }

    public function historiasClinicas()
    {
        return $this->hasMany(Historia_Clinica::class);
    }
}
