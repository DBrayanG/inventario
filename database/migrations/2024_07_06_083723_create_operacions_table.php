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
        Schema::create('operaciones', function (Blueprint $table) {
            $table->id('operacion_id');
            $table->foreignId('producto_id')->constrained('productos','producto_id');
            $table->date('fecha');
            $table->integer('cantidad');
            $table->foreignId('tipo_operacion_id')->constrained('tipo_operaciones','tipo_operacion_id');
            $table->foreignId('agente_id')->constrained('agentes','agente_id');
            $table->foreignId('usuario_id')->constrained('users','usuario_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operaciones');
    }
};
