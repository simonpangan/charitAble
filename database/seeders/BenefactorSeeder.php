<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Benefactor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BenefactorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Benefactor::count() < 100) 
        {
            $users = User::factory()
                ->count(100)
                ->benefactor()
                ->create();

            $users->each(function ($user, $key) use (&$userFollowing) {
                $charity = Benefactor::factory()
                    ->create(['id' => $user->id]);
            });
        }
    }
}
