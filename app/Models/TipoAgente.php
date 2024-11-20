<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoAgente extends Model
{
    use HasFactory;
      // Tabla asociada a este modelo
    protected $table = 'tipo_agentes';

    // Clave primaria de la tabla
    protected $primaryKey = 'tipo_agente_id';

    // Campos que se pueden asignar en masa
    protected $fillable = [
        'nombre',
    ];

    // Relación con el modelo Agente
    public function agentes()
    {
        return $this->hasMany(Agente::class, 'tipo_agente_id', 'tipo_agente_id');
    }
}
