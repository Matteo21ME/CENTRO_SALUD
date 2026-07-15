<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckRole;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'role' => CheckRole::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Capturar globalmente el error del trigger
        $exceptions->render(function (QueryException $e, Request $request) {
            if ($e->getCode() === '45000') {
                return response()->json([
                    'message' => 'El consultorio seleccionado se encuentra en MANTENIMIENTO y no puede recibir citas.',
                    'error' => 'consultorio_mantenimiento'
                ], 422);
            }
        });
    })->create();
