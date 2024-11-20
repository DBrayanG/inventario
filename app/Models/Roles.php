<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Roles extends Model
{
    use HasFactory;
   
    // Tabla asociada a este modelo
    protected $table = 'roles';

    // Clave primaria de la tabla
    protected $primaryKey = 'rol_id';

    // Campos que se pueden asignar en masa
    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    // Relaciones con otros modelos
    public function usuarios()
    {
        return $this->hasMany(User::class, 'rol_id', 'rol_id');
    }

    public function permisos()
    {
        return $this->belongsToMany(Permisos::class, 'roles_permisos', 'rol_id', 'permiso_id');
    }
}
