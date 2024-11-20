<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoOperacion extends Model
{
    use HasFactory;
     // Tabla asociada a este modelo
     protected $table = 'tipo_operaciones';

     // Clave primaria de la tabla
     protected $primaryKey = 'tipo_operacion_id';
 
     // Campos que se pueden asignar en masa
     protected $fillable = [
         'nombre',
     ];
 
     // Relación con el modelo Operacion
     public function operaciones()
     {
         return $this->hasMany(Operacion::class, 'tipo_operacion_id', 'tipo_operacion_id');
     }
}
