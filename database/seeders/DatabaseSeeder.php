<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            CategoriesSeeder::class,
            UsersSeeder::class,
            LogSeeder::class,
            CharitySeeder::class,
            CharityFollowersSeeder::class,
            CharityPostsSeeder::class,
            CharityVolunteerPostSeeder::class,
            CharityProgramSeeder::class,
            ProgramDonationSeeder::class
        ]);
    }
}