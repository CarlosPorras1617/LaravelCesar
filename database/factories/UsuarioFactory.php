<?php

namespace Database\Factories;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //campos de la base de datos a insertar
            'nombre'=> fake()->name(),
            'edad'=> fake()->numberBetween(1,100),
            //hash es para encriptar
            'password'=> Hash::make(Str::random(10)),
            'email'=> fake()->safeEmail(),
        ];
    }
}
