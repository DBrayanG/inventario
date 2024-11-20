<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelEstante extends Model
{
    use HasFactory;
   
    // Tabla asociada a este modelo
    protected $table = 'nivel_estantes';

    // Clave primaria de la tabla
    protected $primaryKey = 'nivel_estante_id';

    // Campos que se pueden asignar en masa
    protected $fillable = [
        'estante_id',
        'nivel_id',
        'nombre',
    ];

    // Relación con el modelo Estante
    public function estante()
    {
        return $this->belongsTo(Estante::class, 'estante_id', 'estante_id');
    }

    // Relación con el modelo Nivel
    public function nivel()
    {
        return $this->belongsTo(Nivel::class, 'nivel_id', 'nivel_id');
    }

    public function productos_niveles()
    {
        return $this->hasMany(ProductoNivelEstante::class,  'nivel_estante_id', 'nivel_estante_id');
    }
}
