<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userRoles = collect(Role::USERS);

        return [
            'email' => $this->faker->unique()->safeEmail(),
            'role_id' => $this->faker->numberBetween($userRoles->first(), $userRoles->last()),
            'email_verified_at' => Carbon::now(config('app.timezone'))->toDateString(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Indicate that the user role should be benefactor
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function benefactor()
    {
        return $this->state(function (array $attributes) {
            return [
                'role_id' => Role::USERS['BENEFACTOR'],
            ];
        });
    }
}
