<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreEspecialidadRequest;
use App\Http\Services\EspecialidadService;

class EspecialidadController extends Controller
{
    protected $especialidadService;

    public function __construct(EspecialidadService $especialidadService)
    {
        $this->especialidadService = $especialidadService;
    }

    public function index()
    {
        return response()->json($this->especialidadService->getAll(), 200);
    }

    public function show($id)
    {
        return response()->json($this->especialidadService->getById((int) $id), 200);
    }

    public function store(StoreEspecialidadRequest $request)
    {
        return response()->json($this->especialidadService->create($request->validated()), 201);
    }

    public function update(Request $request, $id)
    {
        return response()->json($this->especialidadService->update((int) $id, $request->validated()), 200);
    }

    public function destroy($id)
    {
        $this->especialidadService->delete((int) $id);
        return response()->json(null, 204);
    }

}
