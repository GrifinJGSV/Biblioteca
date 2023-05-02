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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_solicitud');
            $table->date('fecha_prestamo');
            $table->date('fecha_devolucion');
            $table->unsignedInteger('libro_id');
            $table->unsignedInteger('usuario_id');
            $table->timestamps();
        });
        Schema::disableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

