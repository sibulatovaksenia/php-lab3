<?php

namespace Database\Factories;

use App\Models\Abonent;
use Illuminate\Database\Eloquent\Factories\Factory;

class AbonentFactory extends Factory
{
    protected $model = Abonent::class;

    public function definition()
    {
        return [
            'phone_number' => $this->faker->phoneNumber,
            'home_address' => $this->faker->address,
            'owner' => $this->faker->name,
            'total_call_duration' => $this->faker->numberBetween(1, 10000),
            'balance' => $this->faker->randomFloat(2, 0, 500), // баланс від 0 до 500
        ];
    }
}
