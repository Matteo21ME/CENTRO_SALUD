@extends('layouts.app')

@section('title', 'Pacientes')

@section('content')
<div class="py-4">
    <div class="bg-white rounded-4 shadow-sm border p-4 mb-4">
        <div class="row align-items-center g-3">
            <div class="col-lg-7">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width:44px;height:44px">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div>
                        <h2 class="mb-0">Módulo de Pacientes</h2>
                        <p class="text-muted mb-0">Gestiona, consulta y organiza la información de pacientes.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <form method="GET" action="{{ route('paciente.index') }}" class="d-flex gap-2">
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-search"></i></span>
                        <input type="text" name="buscar" class="form-control" placeholder="Buscar por cédula, nombre o apellido" value="{{ $buscar ?? '' }}">
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Buscar</button>
                    @if(!empty($buscar))
                        <a href="{{ route('paciente.index') }}" class="btn btn-outline-secondary">Limpiar</a>
                    @endif
                </form>
            </div>
        </div>
    </div>

    @if(session('mensaje'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('mensaje') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="d-flex justify-content-between align-items-center p-4 border-bottom">
                <div>
                    <h3 class="h5 mb-1">Listado de pacientes</h3>
                    <p class="text-muted mb-0">Resultados paginados y filtrados.</p>
                </div>
                <a href="{{ route('paciente.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-1"></i>Crear paciente
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Cédula</th><th>Nombre</th><th>Apellido</th>
                            <th>Fecha Nacimiento</th><th>Teléfono</th><th>Correo</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pacientes as $paciente)
                            <tr>
                                <td class="fw-semibold">{{ $paciente->cedula }}</td>
                                <td>{{ $paciente->nombre }}</td>
                                <td>{{ $paciente->apellido }}</td>
                                <td>{{ $paciente->fecha_nacimiento }}</td>
                                <td>{{ $paciente->telefono }}</td>
                                <td>{{ $paciente->correo }}</td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('paciente.edit', $paciente->id) }}" class="btn btn-warning">
                                            <i class="bi bi-pencil-square me-1"></i>Editar
                                        </a>
                                        <form action="{{ route('paciente.destroy', $paciente->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('¿Eliminar este paciente?')" class="btn btn-danger">
                                                <i class="bi bi-trash3 me-1"></i>Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted">
                                    <i class="bi bi-inbox fs-3 d-block mb-2"></i>No se encontraron pacientes.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center p-3 border-top">
                {{ $pacientes->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
