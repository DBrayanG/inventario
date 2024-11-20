<?php

namespace Database\Factories;

use App\Models\Estante;
use App\Models\Nivel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NivelEstante>
 */
class NivelEstanteFactory extends Factory
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
            'estante_id' => Estante::factory(),
            'nivel_id' => Nivel::factory(),
            'nombre' => $this->faker->word,
        ];
    }
}
