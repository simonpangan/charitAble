<?php

namespace Database\Factories\Charity;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Charity\CharityProgram>
 */
class CharityProgramFactory extends Factory
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
            'description' => $this->faker->paragraph,
            'location' => $this->faker->sentence,  
            'header' => $this->faker->sentence,  
            'goal' => [
                '1' => [
                    'name' => $this->faker->sentence,
                    'date' =>  $this->faker->date()
                ], 
                '2' => [
                    'name' => $this->faker->sentence,
                    'date' =>  $this->faker->date()
                ], 
            ],
            'total_donors' => $this->faker->numberBetween(100, 1000),  
            'total_donation_amount' => $this->faker->numberBetween(100, 50000),  
            'total_withdrawn_amount' => $this->faker->numberBetween(100, 100000),  
            'total_needed_amount' => $this->faker->numberBetween(50000, 100000),  
            'program_expenses' => [
                '1' => [
                    'name' => $this->faker->word,
                    'amount' =>  10000
                ], 
                '2' => [
                    'name' => $this->faker->word,
                    'amount' =>  10000
                ], 
            ],
            'created_at' => $this->faker->dateTimeBetween('-2 years', 'now')
        ];
    }
}
