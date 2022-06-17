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
        $benefactorID = User::where('email', 'simonpangan@yahoo.com')->first(['id'])->id;

        $users = User::factory()->count(10)->charitySuperAdmin()->create();

        $users->each(function ($user) use ($benefactorID, &$userFollowing) {
            Charity::factory()
                ->create([
                    'id' => $user->id
                ]);
        
            array_push($userFollowing, [
                'benefactor_id' => $benefactorID,
                'charity_id' => $user->id,
            ]);
        });
        
        CharityFollowers::insert($userFollowing);
    }
}
