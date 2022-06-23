<?php

namespace Database\Factories\Charity;

use App\Models\Charity\Charity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Charity\Charity>
 */
class CharityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'about' => $this->faker->paragraph(5),
            'header' => $this->faker->sentence,  
            'logo' => $this->faker->sentence,  
            'website_link' =>$this->faker->url,
            'facebook_link' => $this->faker->url, 
            'twitter_link' => $this->faker->url, 
            'instagram_link' => $this->faker->url, 
            'is_pnc_accredited' => $this->faker->numberBetween(0, 1),
            'charity_verified_at' => now()->toDateTimeString(),
            'followers' => $this->faker->numberBetween(0, 5000),
        ];
    }
}
