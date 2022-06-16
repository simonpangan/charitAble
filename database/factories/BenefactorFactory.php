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
            'city' => $this->faker->city,  //to be fix
            'account_type' => Arr::random(['Personal', 'Business']),
            'age' =>$this->faker->numberBetween(18, 100),
            'preferences' => [
                Arr::random(CharityCategory::getCategoriesName())
            ], 
            'total_donation' =>$this->faker->numberBetween(10, 50000),
            'total_charities_donated' =>$this->faker->numberBetween(1, 50),
            'total_charities_followed' =>$this->faker->numberBetween(1, 50),
            'total_number_donations' =>$this->faker->numberBetween(1, 100),
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
