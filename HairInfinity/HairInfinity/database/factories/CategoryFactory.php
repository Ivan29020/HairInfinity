<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
         'name' => fake()->randomElement(['Shampoo', 'Conditioner', 'Hair Gel', 'Hair Spray', 'Leave-in Conditioner', 'Hair Mousse', 'Hair Serum', 'Hair Oil', 'Dry Shampoo', 'Hair Treatment Mask']), // Nome prodotto casuale da una lista
         'description' => fake()->sentence(), // Descrizione casuale del prodotto
        ];
    }
}
