<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Owner;
use Illuminate\Support\Facades\Hash;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Owner::factory()->create([
            'email' =>  'test@example.com', 
            'name' => 'test', 
            'last_name' => 'test',
            'username' => 'test',
            'password' => Hash::make('test'),
            'date_of_birth' => '1990-01-01',
            'tax_code' => 'TAXCOD1234567890',
            'age' =>  35, 
            'gender' => 'F',
        ]);
    }
}
