<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estante extends Model
{
    use HasFactory;
   // Tabla asociada a este modelo
   protected $table = 'estantes';

   // Clave primaria de la tabla
   protected $primaryKey = 'estante_id';

   // Campos que se pueden asignar en masa
   protected $fillable = [
       'nombre',
       'descripcion',
   ];

   // Relación con el modelo NivelEstante
   public function nivelesEstantes()
   {
       return $this->hasMany(NivelEstante::class, 'estante_id', 'estante_id');
   }
}
