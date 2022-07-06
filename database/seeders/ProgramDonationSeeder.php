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

        $programs = CharityProgram::all();

        $benefactors = Benefactor::all();

        $faker = Factory::create();

        foreach ($programs->random(20) as $program) {
            $benefactor->programDonations()->attach($program->id, [
                'amount' => $faker->numberBetween($min = 100, $max = 1000),
                'donated_at' => $faker->dateTimeBetween('-5 years', 'now'),
                'is_anonymous' => $faker->numberBetween(0, 1),
                'transaction_id' => 21312321,
                'tip_price' => 15
            ]);
        }
        
        foreach ($programs as $program) {
            $donations = [];
            
            for ($i = 0; $i < 20; $i++) {
                array_push($donations, [
                    'benefactor_id' => $benefactors->random()->id,
                    'amount' => $faker->numberBetween($min = 100, $max = 1000),
                    'donated_at' => $faker->dateTimeBetween('-5 years', 'now'),
                    'transaction_id' => 21312321,
                    'is_anonymous' => $faker->numberBetween(0, 1),
                    'tip_price' => 15
                ]);
            }

            $program->donations()->attach($donations);
        }
    }
}
