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
        Schema::create('nivel_estantes', function (Blueprint $table) {
            $table->id('nivel_estante_id');
            $table->foreignId('estante_id')->constrained('estantes', 'estante_id');
            $table->foreignId('nivel_id')->constrained('niveles', 'nivel_id');
            $table->string('nombre');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nivel_estantes');
    }
};
