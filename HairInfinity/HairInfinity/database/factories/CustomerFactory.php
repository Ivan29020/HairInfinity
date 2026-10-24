<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'lastName' => fake()->lastName(),
            'date_of_birth' => fake()->date($format = 'Y-m-d', $max = '2005-12-31'), // Massimo 18 anni
            'age' => function (array $attributes) {return \Carbon\Carbon::parse($attributes['date_of_birth'])->age;}
        ];
    }
}
