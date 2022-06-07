<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Benefactor>
 */
class BenefactorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'gender' => Arr::random(['Male', 'Female', 'LGBT', 'Others']),
            'city' => $this->faker->city,  //to be fix
            'account_type' => Arr::random(['Personal', 'Business']),
            'age' =>$this->faker->numberBetween(18, 100),
            'preferences' => $this->faker->lastName, //to be fix
        ];
    }
}
