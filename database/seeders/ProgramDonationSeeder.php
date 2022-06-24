<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Program;
use App\Models\Benefactor;
use App\Models\Charity\CharityProgram;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class ProgramDonationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $benefactor = Benefactor::find(2);


        $program = CharityProgram::all();


        $faker = Factory::create();

        foreach ($program->random(20) as $program) {
            $benefactor->programDonations()->attach($program->id, [
                'amount' => 100,
                'donated_at' => $faker->dateTimeBetween('-5 years', 'now')
            ]);
        }
    }
}