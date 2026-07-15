<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::unprepared("
            CREATE TRIGGER tg_validar_consultorio_disponible
            BEFORE INSERT ON citas_medicas
            FOR EACH ROW
            BEGIN
                DECLARE v_estado VARCHAR(20);

                SELECT estado INTO v_estado
                FROM consultorios
                WHERE id = NEW.consultorio_id;

                IF v_estado = 'MANTENIMIENTO' THEN
                    SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = 'Error: No se puede agendar la cita. El consultorio se encuentra en mantenimiento.';
                END IF;
            END
        ");
    }

    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS tg_validar_consultorio_disponible');
    }
};
