<?php

namespace Database\Factories;

use App\Models\Charity\Charity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Charity>
 */
class CharityFactory extends Factory
{
    protected $model = Charity::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'about' => $this->faker->paragraph,
            'header' => $this->faker->sentence,  
            'logo' => $this->faker->sentence,
            'website_link' =>$this->faker->sentence,
            'twitter_link' => $this->faker->sentence, 
            'is_pnc_accredited' => $this->faker->numberBetween(0, 1),
            'charity_verified_at' => now(),
        ];
    }
}
