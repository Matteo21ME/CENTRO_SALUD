<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('cedula', 10)->notNull();
            $table->string('nombre', 50)->notNull();
            $table->string('apellido', 50)->notNull();
            $table->date('fecha_nacimiento')->notNull();
            $table->string('direccion', 100)->notNull();
            $table->string('correo', 100)->notNull();
            $table->string('telefono', 15)->notNull();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
