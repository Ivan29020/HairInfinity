<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment_method>
 */
class Payment_methodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(['Subscription', 'One-time', 'Recurring']), // Tipo casuale
            'description' => fake()->sentence(), // Descrizione casuale
            'fees' => fake()->randomFloat(2, 5, 1000), // Tariffe casuali tra 5 e 1000 con 2 decimali
        ];
    }
}
