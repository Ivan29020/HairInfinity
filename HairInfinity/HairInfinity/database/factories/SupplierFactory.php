<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(), // Nome casuale
            'email' => fake()->unique()->safeEmail(), // Email univoca
            'phone' => fake()->phoneNumber(), // Numero di telefono casuale
            'address' => fake()->address(), // Indirizzo casuale
            'contract_status' => fake()->randomElement(['Active', 'Suspended']), // Stato del contratto
            'rating' => fake()->randomFloat(2, 1, 5), // Valutazione casuale tra 1 e 5
        ];
    }
}
