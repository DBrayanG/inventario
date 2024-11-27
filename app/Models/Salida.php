<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    use HasFactory;

    protected $table = 'salidas';

    protected $primayKey = 'id';

    protected $fillable = [
        'producto_id',
        'fecha',
        'cantidad',
        'tipo_operacion_id',
        'agente_id',
        'usuario_id'];

    public function producto(){
        return $this->belongsTo(Producto::class, 'producto_id', 'producto_id');
    }

    public function agente()
    {
        return $this->belongsTo(Agente::class, 'agente_id', 'agente_id');
    }

    public function tipoOperacion()
    {
        return $this->belongsTo(TipoOperacion::class, 'tipo_operacion_id');
    }
    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id', 'usuario_id');
    }

}
