<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Charity\CharityVolunteerPost;
use App\Models\VolunteerPostInterest;

class VolunteerPostInterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = CharityVolunteerPost::all('id');

        $posts->each(function ($post) {
            $posts = VolunteerPostInterest::factory()->count(10)->raw([
                'charity_volunteer_post_id' => $post->id,
            ]);
    
            VolunteerPostInterest::insert($posts);
        });
    }
}
