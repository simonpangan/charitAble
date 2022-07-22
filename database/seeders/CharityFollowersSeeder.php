<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Charity\Charity;
use Illuminate\Database\Seeder;
use App\Models\Charity\CharityFollowers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CharityFollowersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userFollowing = array();
        $benefactorID = User::where('email', 'benefactor@gmail.com')->first(['id'])->id;
        
  
        $charities = Charity::all('id')->pluck('id');

        foreach ($charities->random(5) as $id) {
            array_push($userFollowing, [
                'benefactor_id' => $benefactorID,
                'charity_id' => $id,
            ]);
        }
        
        CharityFollowers::insert($userFollowing);
    }
}
