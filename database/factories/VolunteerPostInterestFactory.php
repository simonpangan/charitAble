<?php

namespace Database\Factories;

use App\Models\Benefactor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VolunteerPostInterest>
 */
class VolunteerPostInterestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $benefactor = Benefactor::all('id');

        
        return [
            'benefactor_id' => $benefactor->random()->id,
            'message' => $this->faker->sentence,
            'created_at' => $this->faker->dateTimeThisMonth,
        ];
    }
}
