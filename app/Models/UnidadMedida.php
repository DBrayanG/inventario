<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    use HasFactory;
    // Tabla asociada a este modelo
    protected $table = 'unidad_medidas';

    // Clave primaria de la tabla
    protected $primaryKey = 'unidad_medida_id';

    // Campos que se pueden asignar en masa
    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    // Relaciones con otros modelos (si las hay)
    public function productos()
    {
        return $this->hasMany(Producto::class, 'unidad_medida_id', 'unidad_medida_id');
    }
}
