<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Charity\Charity;
use Illuminate\Database\Seeder;
use App\Models\Charity\CharityPosts;
use App\Models\Charity\CharityFollowers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CharityPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $benefactorID = User::where('email', 'benefactor@gmail.com')->first(['id'])->id;

        // $benefactorFollowingList = CharityFollowers::query()
        //     ->where('benefactor_id', $benefactorID)->get()
        //     ->pluck('charity_id');


        $charitiesID = Charity::all()->pluck('id');

        $charitiesID->each(function ($charityID) {
            $posts = CharityPosts::factory()->count(10)->raw([
                'charity_id' => $charityID
            ]);

            CharityPosts::insert($posts);
        });

        // $benefactorFollowingList->each(function ($charityID) {
        //     $posts = CharityPosts::factory()->count(1)->raw([
        //         'charity_id' => $charityID
        //     ]);

        //     CharityPosts::insert($posts);
        // });
    }
}
