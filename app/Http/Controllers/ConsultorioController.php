<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ConsultorioService;
use App\Http\Requests\StoreConsultorioRequest;
use App\Http\Requests\UpdateConsultorioRequest;



class ConsultorioController extends Controller
{
    protected $consultorioService;

    public function __construct(ConsultorioService $consultorioService)
    {
        $this->consultorioService = $consultorioService;
    }

    public function index()
    {
        return response()->json($this->consultorioService->getAll(), 200);
    }

    public function show($id)
    {
        return response()->json($this->consultorioService->getById((int) $id), 200);
    }

    public function store(StoreConsultorioRequest $request)
    {
        return response()->json($this->consultorioService->create($request->validated()), 201);
    }

    public function update(UpdateConsultorioRequest $request, $id)
    {
        return response()->json($this->consultorioService->update((int) $id, $request->validated()), 200);
    }

    public function destroy($id)
    {
        $this->consultorioService->delete((int) $id);
        return response()->json(null, 204);
    }
}
