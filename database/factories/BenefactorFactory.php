<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Arr;
use App\Enums\CharityCategory;
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
            'birth_date' =>$this->faker->date,
            'preferences' => ['1','2','3'], 
        ];
    }

    public function addUser()
    {
        return $this->state(function (array $attributes) {
            return [
                'id' => User::factory()->create()->id,
            ];
        });
    }
  
}
