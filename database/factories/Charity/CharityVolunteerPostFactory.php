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
            'name' => $this->faker->word,
            'description' => $this->faker->paragraph(2),
            'location' => '1012 Sta. Maria St., Malinta, Valenzuela City',  
            'qualifications' => $this->faker->paragraph,
            'incentives' => $this->faker->sentence,  
            'created_at' => $this->faker->dateTimeBetween('-2 years', 'now')
        ];
    }
}
