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
            'header' => 'https://andscape.com/wp-content/uploads/2019/02/GettyImages-1125042094-e1550278649308.jpg?w=700',  
            'goals' => [
                '1' => [
                    'name' => $this->faker->sentence,
                    'date' =>  $this->faker->date()
                ], 
                '2' => [
                    'name' => $this->faker->sentence,
                    'date' =>  $this->faker->date()
                ], 
            ],
            'total_withdrawn_amount' => 1000,  
            'total_needed_amount' => 20000,  
            'expenses' => [
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
