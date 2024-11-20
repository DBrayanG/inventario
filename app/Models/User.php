<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
  // Nombre de la tabla en la base de datos
  protected $table = 'users';
    // Clave primaria de la tabla
    protected $primaryKey = 'usuario_id';

    // Campos que se pueden asignar en masa
    protected $fillable = [
        'name',
        'email',
        'password',
        'password_reset',
        'img_url',
        'rol_id',
    ];


    protected $hidden = [
        'password',
        'password_reset',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function adminlte_image()
    {
       
        // Retorna una imagen de perfil predeterminada si el usuario no tiene una imagen
        return asset('vendor/adminlte/dist/img/profile-user.png');
    }

    public function adminlte_desc()
    {
        return $this->rol ?? 'User'; // Cambia esto según cómo gestiones los roles
    }

    // Relación con el modelo Rol
    public function rol()
    {
        return $this->belongsTo(Roles::class, 'rol_id', 'rol_id');
    }

    // Relación con el modelo Operacion
    public function operaciones()
    {
        return $this->hasMany(Operacion::class, 'usuario_id', 'usuario_id');
    }
}
