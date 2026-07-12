<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::updateOrCreate(['nombre' => 'Administrador'], ['descripcion' => 'Acceso total DDL y DML']);
        Role::updateOrCreate(['nombre' => 'Desarrollador'], ['descripcion' => 'Consultas, vistas y optimizacion sin datos sensibles']);
        Role::updateOrCreate(['nombre' => 'Supervisor'],    ['descripcion' => 'Solo lectura SELECT y vistas']);
    }
}
