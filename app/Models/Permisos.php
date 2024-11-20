<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permisos extends Model
{
    use HasFactory;
    protected $table = 'permisos';

    // Clave primaria de la tabla
    protected $primaryKey = 'permiso_id';

    // Campos que se pueden asignar en masa
    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    // Relaciones con otros modelos
    public function roles()
    {
        return $this->belongsToMany(Roles::class, 'roles_permisos', 'permiso_id', 'rol_id');
    }
}
