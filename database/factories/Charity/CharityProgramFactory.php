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
                    'goalName' => $this->faker->sentence,
                     'date-goalName' =>  $this->faker->date()
                ], 
                '2' => [
                    'goalName' => $this->faker->sentence,
                     'date-goalName' =>  $this->faker->date()
                ], 
            ],
            'total_donation_amount' => 50000,  
            'total_withdrawn_amount' => 40000,  
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
