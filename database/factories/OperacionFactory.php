<?php

namespace Database\Factories;

use App\Models\Agente;
use App\Models\Producto;
use App\Models\TipoOperacion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Operacion>
 */
class OperacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'producto_id' => Producto::factory(),
            'fecha' => $this->faker->date,
            'cantidad' => $this->faker->numberBetween(0, 100),
            'tipo_operacion_id' => TipoOperacion::factory(),
            'agente_id' => Agente::factory(),
            'usuario_id' => User::factory(),
        ];
    }
}
