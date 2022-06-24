<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\Charity\Charity;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CharityLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $charities = Charity::all('id');
        $locations = Location::all('id');

        $charities->each(function ($charity, $key) use($locations) {
            $charity->locations()->attach($locations->random(3)->pluck('id'));
        });
    }
}
