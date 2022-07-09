<?php

namespace Database\Seeders;

use App\Models\Charity\Charity;
use Illuminate\Database\Seeder;
use App\Models\Charity\CharityProgram;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CharityProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CharityProgram::withoutEvents(function () {
            $charity = Charity::all();

            $charity->each(function ($charity) {
                $posts = CharityProgram::factory()->count(40)->raw([
                    'charity_id' => $charity->id
                ]);
            
                $charity->programs()->createMany($posts);
            });
        });

    }
}
