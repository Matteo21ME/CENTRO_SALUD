<?php

namespace App\Http\Services;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Collection;

class PacienteService
{
    public function getAll(): Collection
    {
        return Paciente::all();
    }

    public function getById(int $id): Paciente
    {
        return Paciente::findOrFail($id);
    }

    public function create(array $data): Paciente
    {
        return Paciente::create($data);
    }

    public function update(int $id, array $data): Paciente
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->update($data);
        return $paciente->fresh();
    }

    public function delete(int $id): void
    {
        Paciente::findOrFail($id)->delete();
    }
}
