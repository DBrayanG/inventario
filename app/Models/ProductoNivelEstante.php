<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoNivelEstante extends Model
{
    use HasFactory;
 // Tabla asociada a este modelo
 protected $table = 'producto_estantes';

 // Clave primaria de la tabla
 protected $primaryKey = 'producto_estante_id';

 // Campos que se pueden asignar en masa
 protected $fillable = [
     'cantidad',
     'producto_id',
     'nivel_estante_id',
 ];

 // Relación con el modelo Producto
 public function producto()
 {
     return $this->belongsTo(Producto::class, 'producto_id', 'producto_id');
 }

 // Relación con el modelo NivelEstante
 public function nivelEstante()
 {
     return $this->belongsTo(NivelEstante::class, 'nivel_estante_id', 'nivel_estante_id');
 }
}
