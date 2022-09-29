<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            /*
            'nombre'=>fake()->name(),
            'cantidad'=>fake->numberBetween(1,100),
            'precio'=>fake()->numberBetween(60, 1000),
            'descripcion'=>fake()->text()
            */
        ];
    }
}
