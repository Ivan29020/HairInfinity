<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Warehouse>
 */
class WarehouseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(), // Nome casuale di una compagnia
            'description' => fake()->sentence(), // Descrizione casuale
            'address' => fake()->address(), // Indirizzo casuale
            'capacity' => fake()->numberBetween(50, 500), // Capacità casuale tra 50 e 500
        ];
    }
}
