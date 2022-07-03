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
            LocationSeeder::class,
            CategoriesSeeder::class,
            UsersSeeder::class,
            BenefactorSeeder::class,
            LogSeeder::class,
            CharitySeeder::class,
            CharityFollowersSeeder::class,
            CharityOfficersSeeder::class,
            CharityPostsSeeder::class,
            CharityVolunteerPostSeeder::class,
            CharityProgramSeeder::class,
            ProgramDonationSeeder::class,
            VolunteerPostInterestSeeder::class
        ]);
    }
}