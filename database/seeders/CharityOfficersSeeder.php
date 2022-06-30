<?php

namespace Database\Seeders;

use App\Models\Charity\Charity;
use Illuminate\Database\Seeder;
use App\Models\Charity\CharityOfficers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CharityOfficersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CharityOfficers::withoutEvents(function () {
            $charity = Charity::all();

            $charity->each(function ($charity) {
                $posts = CharityOfficers::factory()->count(5)->raw([
                    'charity_id' => $charity->id
                ]);
            
                $charity->officers()->createMany($posts);
            });
        });
    }
}
