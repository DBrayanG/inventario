<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operacion extends Model
{
    use HasFactory;
   
    // Tabla asociada a este modelo
    protected $table = 'operaciones';

    // Clave primaria de la tabla
    protected $primaryKey = 'operacion_id';

    // Campos que se pueden asignar en masa
    protected $fillable = [
        'producto_id',
        'fecha',
        'cantidad',
        'tipo_operacion_id',
        'agente_id',
        'usuario_id',
    ];

    // Relación con el modelo Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id', 'producto_id');
    }

    // Relación con el modelo TipoOperacion
    public function tipoOperacion()
    {
        return $this->belongsTo(TipoOperacion::class, 'tipo_operacion_id', 'tipo_operacion_id');
    }

    // Relación con el modelo Agente
    public function agente()
    {
        return $this->belongsTo(Agente::class, 'agente_id', 'agente_id');
    }

    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id', 'usuario_id');
    }

}
