<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;
      // Tabla asociada a este modelo
      protected $table = 'niveles';

      // Clave primaria de la tabla
      protected $primaryKey = 'nivel_id';
  
      // Campos que se pueden asignar en masa
      protected $fillable = [
          'nombre',
      ];
  
      // Relación con el modelo NivelEstante
      public function nivelesEstantes()
      {
          return $this->hasMany(NivelEstante::class, 'nivel_id', 'nivel_id');
      }
}
