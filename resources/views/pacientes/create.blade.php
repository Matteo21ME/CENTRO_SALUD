@extends('layouts.app')

@section('title', 'Crear estudiante')

@section('content')
<div class="py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-xxl-10">
            <form action="{{ route('estudiante.store') }}" method="POST">
                @csrf
                @include('estudiante.form', ['modo' => 'Crear'])
            </form>
        </div>
    </div>
</div>
@endsection
