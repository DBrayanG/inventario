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
        Schema::create('producto_nivel_estantes', function (Blueprint $table) {
            $table->id('producto_estante_id');
            $table->integer('cantidad');
            $table->foreignId('producto_id')->constrained('productos','producto_id');
            $table->foreignId('nivel_estante_id')->constrained('nivel_estantes','nivel_estante_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto_nivel_estantes');
    }
};
