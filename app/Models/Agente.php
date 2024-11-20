<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agente extends Model
{
    use HasFactory;
   // Tabla asociada a este modelo
   protected $table = 'agentes';

   // Clave primaria de la tabla
   protected $primaryKey = 'agente_id';

   // Campos que se pueden asignar en masa
   protected $fillable = [
       'nombre',
       'telefono',
       'email',
       'direccion',
       'tipo_agente_id',
   ];

   // Relación con el modelo TipoAgente
   public function tipoAgente()
   {
       return $this->belongsTo(TipoAgente::class, 'tipo_agente_id', 'tipo_agente_id');
   }
}
