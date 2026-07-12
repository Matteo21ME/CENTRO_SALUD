<?php

namespace App\Http\Services;

use App\Models\Cita_Medica;
use Illuminate\Database\Eloquent\Collection;

class CitaMedicaService
{
    public function getAll(): Collection
    {
        return Cita_Medica::with(['paciente', 'medico', 'consultorio'])->get();
    }

    public function getById(int $id): Cita_Medica
    {
        return Cita_Medica::with(['paciente', 'medico', 'consultorio'])->findOrFail($id);
    }

    public function create(array $data): Cita_Medica
    {
        return Cita_Medica::create($data);
    }

    public function update(int $id, array $data): Cita_Medica
    {
        $citaMedica = Cita_Medica::findOrFail($id);
        $citaMedica->update($data);
        return $citaMedica->fresh();
    }

    public function delete(int $id): void
    {
        Cita_Medica::findOrFail($id)->delete();
    }
}
