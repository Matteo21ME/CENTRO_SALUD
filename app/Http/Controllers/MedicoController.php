<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreMedicoRequest;
use App\Http\Requests\UpdateMedicoRequest;
use App\Http\Services\MedicoService;

class MedicoController extends Controller
{
    protected $medicoService;

    public function __construct(MedicoService $medicoService)
    {
        $this->medicoService = $medicoService;
    }

    public function index()
    {
        return response()->json($this->medicoService->getAll(), 200);
    }

    public function show($id)
    {
        return response()->json($this->medicoService->getById((int) $id), 200);
    }

    public function store(StoreMedicoRequest $request)
    {
        return response()->json($this->medicoService->create($request->validated()), 201);
    }

    public function update(UpdateMedicoRequest $request, $id)
    {
        return response()->json($this->medicoService->update((int) $id, $request->validated()), 200);
    }

    public function destroy($id)
    {
        $this->medicoService->delete((int) $id);
        return response()->json(null, 204);
    }


}
