<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\Location;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
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
        $locations = Location::all('id')->pluck('id');

        return [
            'email' => $this->faker->unique()->email,
            'role_id' => $this->faker->numberBetween($userRoles->first(), $userRoles->last()),
            'email_verified_at' => Carbon::now(config('app.timezone'))->toDateString(),
            'address' => $this->faker->address,
            'location_id' => $locations->random(),
            'password' => $this->faker->password,
            'remember_token' => null,
            'created_at' => $this->faker->dateTimeBetween('-2 years', 'now')
        ];
    }

     /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function password()
    {
        return $this->state(function (array $attributes) {
            return [
                'password' => Hash::make($this->faker->password(8)),
            ];
        });
    }

     /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function remember()
    {
        return $this->state(function (array $attributes) {
            return [
                'remember_token' => Str::random(10),
            ];
        });
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

    /**
     * Indicate that the user role should be charity admin
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function charityAdmin()
    {
        return $this->state(function (array $attributes) {
            return [
                'role_id' => Role::USERS['CHARITY_ADMIN'],
                'email' => $this->faker->companyEmail,
            ];
        });
    }

    /**
     * Indicate that the user role should be charity super admin
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function charitySuperAdmin()
    {
        return $this->state(function (array $attributes) {
            return [
                'role_id' => Role::USERS['CHARITY_SUPER_ADMIN'],
            ];
        });
    }
}
