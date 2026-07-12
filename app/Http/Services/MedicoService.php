<?php

namespace App\Http\Services;

use App\Models\Medico;
use Illuminate\Database\Eloquent\Collection;

class MedicoService
{    
    public function getAll(): Collection
    {
        return Medico::with('especialidad')->get();
    }

    public function getById(int $id): Medico
    {
        return Medico::with('especialidad')->findOrFail($id);
    }

    public function create(array $data): Medico
    {
        return Medico::create($data);
    }

    public function update(int $id, array $data): Medico
    {
        $medico = Medico::findOrFail($id);
        $medico->update($data);
        return $medico->fresh();
    }

    public function delete(int $id): void
    {
        Medico::findOrFail($id)->delete();
    }
}
