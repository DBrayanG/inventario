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
        Schema::create('agentes', function (Blueprint $table) {
            $table->id('agente_id');
            $table->string('nombre');
            $table->string('telefono');
            $table->string('email')->unique();
            $table->string('direccion');
            $table->foreignId('tipo_agente_id')->constrained('tipo_agentes','tipo_agente_id');
            $table->timestamps();
        });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agentes');
    }
};
