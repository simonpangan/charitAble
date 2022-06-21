<?php

namespace Database\Factories\Charity;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Charity\CharityVolunteerPost>
 */
class CharityVolunteerPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'description' => $this->faker->paragraph,
            'location' => $this->faker->sentence,  
            'qualifications' => [
                '1' => $this->faker->sentence, 
                '2' => $this->faker->sentence, 
            ],
            'image' => $this->faker->sentence,  
            'incentives' => $this->faker->sentence,  
            'created_at' => $this->faker->dateTimeBetween('-2 years', 'now')
        ];
    }
}
