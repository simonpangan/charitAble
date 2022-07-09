<?php

namespace Database\Seeders;

use App\Models\Charity\Charity;
use Illuminate\Database\Seeder;
use App\Models\Charity\CharityVolunteerPost;

class CharityVolunteerPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CharityVolunteerPost::withoutEvents(function () {
            $charity = Charity::all();

            $charity->each(function ($charity) {
                $posts = CharityVolunteerPost::factory()->count(40)->raw([
                    'charity_id' => $charity->id
                ]);
            
                $charity->volunteerPosts()->createMany($posts);
            });
        });
    }
}
