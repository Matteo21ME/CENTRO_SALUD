<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Role::where('nombre', 'Administrador')->first();
        $dev   = Role::where('nombre', 'Desarrollador')->first();
        $sup   = Role::where('nombre', 'Supervisor')->first();

        User::updateOrCreate(
            ['email' => 'admin@centrosalud.local'],
            ['name' => 'Admin', 'password' => Hash::make('admin123'), 'role_id' => $admin?->id]
        );

        User::updateOrCreate(
            ['email' => 'dev@centrosalud.local'],
            ['name' => 'Desarrollador', 'password' => Hash::make('dev12345'), 'role_id' => $dev?->id]
        );

        User::updateOrCreate(
            ['email' => 'supervisor@centrosalud.local'],
            ['name' => 'Supervisor', 'password' => Hash::make('super123'), 'role_id' => $sup?->id]
        );
    }
}
