<?php

namespace App\Http\Services;

use App\Models\Consultorio;
use Illuminate\Database\Eloquent\Collection;

class ConsultorioService
{
    public function getAll(): Collection
    {
        return Consultorio::all();
    }

    public function getById(int $id): Consultorio
    {
        return Consultorio::findOrFail($id);
    }

    public function create(array $data): Consultorio
    {
        return Consultorio::create($data);
    }

    public function update(int $id, array $data): Consultorio
    {
        $consultorio = Consultorio::findOrFail($id);
        $consultorio->update($data);
        return $consultorio->fresh();
    }

    public function delete(int $id): void
    {
        Consultorio::findOrFail($id)->delete();
    }
}
