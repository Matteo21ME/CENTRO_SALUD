<?php

namespace App\Http\Services;

use App\Models\Especialidad;
use Illuminate\Database\Eloquent\Collection;

class EspecialidadService
{
    public function getAll(): Collection
    {
        return Especialidad::all();
    }

    public function getById(int $id): Especialidad
    {
        return Especialidad::findOrFail($id);
    }

    public function create(array $data): Especialidad
    {
        return Especialidad::create($data);
    }

    public function update(int $id, array $data): Especialidad
    {
        $especialidad = Especialidad::findOrFail($id);
        $especialidad->update($data);
        return $especialidad->fresh();
    }

    public function delete(int $id): void
    {
        Especialidad::findOrFail($id)->delete();
    }
}
