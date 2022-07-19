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
         $program = [
            'name' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'location' => '1012 Sta. Maria St., Malinta, Valenzuela City',   
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
            'created_at' => $this->faker->dateTimeBetween('-2 years', 'now'),
        ];

        return array_merge($program , [
            'total_withdrawn_amount' => 1000,  
            'total_needed_amount' => 20000,  
            'has_withdraw_request' => $this->faker->numberBetween(0,1),  
            'withdraw_request_amount' => 1000,  
            'withdraw_requested_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'is_active' => $this->faker->numberBetween(0,1),
            'header' => 'https://andscape.com/wp-content/uploads/2019/02/GettyImages-1125042094-e1550278649308.jpg?w=700',  
            'gcash' => '09274128230',  
            'updates' => [$program] 
        ]);
    }
}
