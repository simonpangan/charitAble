<?php

namespace Database\Factories\Charity;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Charity\CharityPosts>
 */
class CharityPostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'main_content_body' => $this->faker->paragraph,
            'main_content_body_image' => $this->faker->sentence,  
            'created_at' => now()
        ];
    }
}
