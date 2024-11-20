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
        Schema::create('productos', function (Blueprint $table) {
                $table->id('producto_id'); // Clave primaria personalizada
                $table->string('codigo_barra')->nullable();
                $table->string('nombre');
                $table->text('descripcion')->nullable();
                $table->date('fecha_venc');
                $table->string('imagen_url');
                $table->decimal('costo_unitario', 10, 2);
                $table->integer('demanda_anual');
                $table->integer('punto_reorden');
                $table->integer('stock_actual');
                $table->integer('stock_minimo');
                $table->foreignId('categoria_id')->constrained('categorias', 'categoria_id'); // Clave foránea para 'categorias'
                $table->foreignId('unidad_medida_id')->constrained('unidad_medidas', 'unidad_medida_id'); // Clave foránea para 'unidad_medidas'
                $table->timestamps();
            });
        
      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
