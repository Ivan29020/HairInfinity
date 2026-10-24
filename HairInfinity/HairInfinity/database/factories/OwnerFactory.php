<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Owner>
 */
class OwnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected static ?string $password;
    public function definition(): array
    {
        return [
            'email' => fake()->unique()->safeEmail(),
            'name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'username' => fake()->userName(),
            'password' => static::$password ??= Hash::make('password'),
            'date_of_birth' => fake()->date($format = 'Y-m-d', $max = '2005-12-31'), // Massimo 18 anni
            'tax_code' => fake()->regexify('[A-Za-z0-9]{16}'),  // Codice fiscale fittizio
            'age' => function (array $attributes) {return Carbon::parse($attributes['date_of_birth'])->age;},
            'gender' => fake()->randomElement(['M', 'F']),
        ];
    }
}
