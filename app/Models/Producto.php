<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    use HasFactory;
    // Tabla asociada a este modelo
    protected $table = 'productos';

    // Clave primaria de la tabla
    protected $primaryKey = 'producto_id';

    // Campos que se pueden asignar en masa
    protected $fillable = [
        'codigo_barra',
        'nombre',
        'descripcion',
        'fecha_venc',
        'imagen_url',
        'costo_unitario',
        'demanda_anual',
        'punto_reorden',
        'stock_actual',
        'stock_minimo',
        'categoria_id',
        'unidad_medida_id',
    ];

    // Relaciones con otros modelos
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'categoria_id');
    }

    public function unidadMedida()
    {
        return $this->belongsTo(UnidadMedida::class, 'unidad_medida_id', 'unidad_medida_id');
    }

    public function registrosStock()
    {
        return $this->hasMany(registrosStock::class, 'producto_id', 'producto_id');
    }

    public function operaciones()
    {
        return $this->hasMany(Operacion::class, 'producto_id', 'producto_id');
    }

    public function productoEstante()
    {
        return $this->hasMany(ProductoNivelEstante::class, 'producto_id', 'producto_id');
    }
}
