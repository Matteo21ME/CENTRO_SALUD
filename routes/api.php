<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\CitaMedicaController;
use App\Http\Controllers\ConsultorioController;

// Autenticacion (publica)
Route::post('/auth/login', [AuthController::class, 'login']);

// Rutas protegidas: requieren token valido
Route::middleware('auth:sanctum')->group(function () {

    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::get('/auth/me',     [AuthController::class, 'me']);

    // Lectura: todos los roles pueden consultar
    Route::middleware('role:Administrador,Desarrollador,Supervisor')->group(function () {
        Route::get('/pacientes',           [PacienteController::class,    'index']);
        Route::get('/pacientes/{id}',      [PacienteController::class,    'show']);
        Route::get('/medicos',             [MedicoController::class,      'index']);
        Route::get('/medicos/{id}',        [MedicoController::class,      'show']);
        Route::get('/especialidades',      [EspecialidadController::class,'index']);
        Route::get('/especialidades/{id}', [EspecialidadController::class,'show']);
        Route::get('/citas',               [CitaMedicaController::class,  'index']);
        Route::get('/citas/{id}',          [CitaMedicaController::class,  'show']);
        Route::get('/consultorios',        [ConsultorioController::class, 'index']);
        Route::get('/consultorios/{id}',   [ConsultorioController::class, 'show']);
        Route::get('/roles',               [RoleController::class,        'index']);
    });

    // Escritura y gestion: solo Administrador
    Route::middleware('role:Administrador,Desarrollador')->group(function () {
        Route::post('/pacientes',               [PacienteController::class,    'store']);
        Route::put('/pacientes/{id}',           [PacienteController::class,    'update']);
        Route::delete('/pacientes/{id}',        [PacienteController::class,    'destroy']);

        Route::post('/medicos',                 [MedicoController::class,      'store']);
        Route::put('/medicos/{id}',             [MedicoController::class,      'update']);
        Route::delete('/medicos/{id}',          [MedicoController::class,      'destroy']);

        Route::post('/especialidades',          [EspecialidadController::class,'store']);
        Route::put('/especialidades/{id}',      [EspecialidadController::class,'update']);
        Route::delete('/especialidades/{id}',   [EspecialidadController::class,'destroy']);

        Route::post('/citas',                   [CitaMedicaController::class,  'store']);
        Route::put('/citas/{id}',               [CitaMedicaController::class,  'update']);
        Route::delete('/citas/{id}',            [CitaMedicaController::class,  'destroy']);

        Route::post('/consultorios',            [ConsultorioController::class, 'store']);
        Route::put('/consultorios/{id}',        [ConsultorioController::class, 'update']);
        Route::delete('/consultorios/{id}',     [ConsultorioController::class, 'destroy']);

        Route::get('/usuarios',                 [UserController::class, 'index']);
        Route::get('/usuarios/{id}',            [UserController::class, 'show']);
        Route::post('/usuarios',                [UserController::class, 'store']);
        Route::put('/usuarios/{id}',            [UserController::class, 'update']);
        Route::delete('/usuarios/{id}',         [UserController::class, 'destroy']);
    });
});
