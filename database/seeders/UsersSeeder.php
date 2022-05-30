<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use Faker\Generator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Container\Container;
use Illuminate\Support\LazyCollection;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        LazyCollection::make(function () {
//            for ($i = 0; $i < 50000; $i++) {
//                yield User::factory()->raw();
//            }
//        })->chunk(5000)->each(function ($chunk) {
//            User::insert($chunk->toArray());
//        });

//        $users = collect(User::factory()->count(10)->unverified()->benefactor()->raw());
//        $users = User::factory()->count(50000)->lazyRaw();
//
//        $users->chunk(5000)->each(function ($chunk) {
//            User::insertOrIgnore($chunk->toArray());
//        });

        User::Create(
            [
                'firstName' => 'simonpangan',
                'lastName' => 'simonpangan',
                'email' => 'simonpangan@yahoo.com',
                'role_id' => Role::USERS['BENEFACTOR'],
//                'email_verified_at' => Carbon::now(config('app.timezone')),
                'email_verified_at' => null,
                'password' => Hash::make('simonpangan'),
            ]
        );
    }
}
