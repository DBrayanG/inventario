<?php

namespace Database\Factories;

use App\Models\Permisos;
use App\Models\Roles;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RolesPermisos>
 */
class RolesPermisosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rol_id' => Roles::factory(),
            'permiso_id' => Permisos::factory(),
        ];
    }
}
