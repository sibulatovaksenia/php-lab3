<?php

namespace Database\Seeders;

use App\Models\Abonent; // Підключення моделі
use Illuminate\Database\Seeder;

class AbonentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Abonent::create([
            'phone_number' => '0931234567',
            'home_address' => 'Kyiv, Shevchenka 5',
            'owner' => 'Ivan Ivanov',
            'total_call_duration' => 120.5, // 120 хвилин
            'balance' => 150.75, // 150.75 грн
        ]);

        Abonent::create([
            'phone_number' => '0952345678',
            'home_address' => 'Lviv, Khmelnytskoho 8',
            'owner' => 'Petro Petrov',
            'total_call_duration' => 85.3,
            'balance' => 200.10,
        ]);

        Abonent::create([
            'phone_number' => '0973456789',
            'home_address' => 'Odesa, Deribasivska 12',
            'owner' => 'Sofia Sidorova',
            'total_call_duration' => 250.0,
            'balance' => 320.50,
        ]);
    }
}
