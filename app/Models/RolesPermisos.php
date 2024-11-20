<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolesPermisos extends Model
{
    use HasFactory;
   // Tabla asociada a este modelo
   protected $table = 'roles_permisos';

   // Clave primaria de la tabla
   protected $primaryKey = 'roles_permisos_id';

   // Campos que se pueden asignar en masa
   protected $fillable = [
       'rol_id',
       'permiso_id',
   ];

   // Desactivar timestamps
   public $timestamps = false;

   // Relaciones con otros modelos
   public function rol()
   {
       return $this->belongsTo(Roles::class, 'rol_id', 'rol_id');
   }

   public function permiso()
   {
       return $this->belongsTo(Permisos::class, 'permiso_id', 'permiso_id');
   }

}
