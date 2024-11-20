<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Categoria extends Pivot
{
    //
    public $timestamps = true;
 
      // Tabla asociada a este modelo
      protected $table = 'categorias';

      // Clave primaria de la tabla
      protected $primaryKey = 'categoria_id';
  
      // Campos que se pueden asignar en masa
      protected $fillable = [
          'nombre',
          'descripcion',
      ];
  
      // Relaciones con otros modelos (si las hay)
      public function productos()
      {
          return $this->hasMany(Producto::class, 'categoria_id', 'categoria_id');
      }

}
