<?php

namespace Database\Factories;

use App\Models\Receipt;
use App\Models\Payment_method;  // Importa il modello Payment_method
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Receipt>
 */
class ReceiptFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'issue_date' => $this->faker->date(),  // Genera una data casuale
            'total' => $this->faker->randomFloat(2, 10, 1000),  // Genera un valore casuale per il totale
            'payment_method_id' => Payment_method::factory(),  // Associa una chiave esterna (se hai una relazione con Payment_method)
        ];
    }
}
