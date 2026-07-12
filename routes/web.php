<?php

use Illuminate\Support\Facades\Route;

// Sirve la SPA de Vue para cualquier ruta web (Vue Router maneja la navegacion)
Route::get('/{any}', function () {
    $spa = public_path('index.html');
    if (file_exists($spa)) {
        return response(file_get_contents($spa))
            ->header('Content-Type', 'text/html');
    }
    return response('Frontend no compilado. Ejecuta: npm run build', 503);
})->where('any', '.*');
