<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultorio extends Model
{
    protected $fillable = [
        'piso',
        'estado',
        'direccion',
    ];

    public function citasMedicas()
    {
        return $this->hasMany(Cita_Medica::class);
    }
}
