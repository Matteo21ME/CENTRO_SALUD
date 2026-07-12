<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = [
        'cedula',
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'direccion',
        'correo',
        'telefono',
    ];

    public function citasMedicas()
    {
        return $this->hasMany(Cita_Medica::class);
    }

    public function historiasClinicas()
    {
        return $this->hasMany(Historia_Clinica::class);
    }
}
