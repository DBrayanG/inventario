<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrosStock extends Model
{
    use HasFactory;
    
      // Tabla asociada a este modelo
      protected $table = 'registro_stocks';

      // Clave primaria de la tabla
      protected $primaryKey = 'registro_stock_id';
  
      // Campos que se pueden asignar en masa
      protected $fillable = [
          'producto_id',
          'fecha_registro',
          'cantidad',
      ];
  
      // Relación con el modelo Producto
      public function producto()
      {
          return $this->belongsTo(Producto::class, 'producto_id', 'producto_id');
      }
}
