@extends('layouts.app')

@section('title', 'Editar Paciente')

@section('content')
<div class="py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-xxl-10">
            <form action="{{ route('paciente.update', $paciente->id) }}" method="POST">
                @csrf
                @method('PATCH')
                @include('pacientes.form', ['modo' => 'Editar'])
            </form>
        </div>
    </div>
</div>
@endsection
