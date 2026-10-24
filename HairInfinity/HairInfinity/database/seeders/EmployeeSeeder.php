<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::factory()->create([
            'email' =>  'prova@example.com',
            'name' => 'prova',
            'lastName' => 'prova',
            'username' => 'prova',
            'password' => Hash::make('prova'),
            'date_of_birth' => '1990-01-01',
            'tax_code' => 'TAXCOD1234567890',
            'age' =>  35,
            'salary' => 3000.50,
            'gender' => 'M',
            'date_of_hire' =>  '2023-01-01',
        ]);
    }
}
