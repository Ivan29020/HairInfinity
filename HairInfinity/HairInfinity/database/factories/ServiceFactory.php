<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(), // Nome del prodotto casuale
            'description' => fake()->sentence(), // Descrizione casuale del prodotto
            'price' => fake()->randomFloat(2, 10, 500), // Prezzo casuale tra 10 e 500 con 2 decimali
        ];
    }
}
