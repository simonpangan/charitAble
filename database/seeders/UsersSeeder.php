<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Log;
use App\Models\Role;
use App\Models\User;
use Faker\Generator;
use Illuminate\Support\Str;
use App\Models\Charity\Charity;
use Illuminate\Database\Seeder;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Hash;
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

        $benefactor = User::firstOrCreate(
            [
                'email' => 'simonpangan@yahoo.com',
                'role_id' => Role::USERS['BENEFACTOR'],
               'email_verified_at' => Carbon::now(config('app.timezone')),
                // 'email_verified_at' => null,    
                'password' => Hash::make('simonpangan'),
            ]
        );
        
        $benefactor->logs()->createMany($this->createLogsForUser());

        $benefactor->benefactor()->create([
            'first_name' => 'Simon Joseph',
            'last_name' => 'Pangan',
            'gender' => 'Male',
            'age' => '22',
            'city' => 'Valenzuela',
            'preferences' => ['COMMUNITY_DEVELOPMENT'],
            'account_type' => 'Personal',
            'total_donation' => '10000',
            'total_charities_donated' => '10',
            'total_charities_followed' => '5',
            'total_number_donations' => '10',
        ]);

        $charity = User::firstOrCreate(
            ['email' => 'charity@gmail.com'],
            [
                'email' => 'charity@gmail.com',
                'role_id' => Role::USERS['CHARITY_SUPER_ADMIN'],
                'email_verified_at' => Carbon::now(config('app.timezone')),
                'password' => Hash::make('charity'),
            ]
        );

        // if (Log::where('user_id', $charity->id)->get()->count() < 5) {
        //     $charity->charity()->create(Charity::factory()->raw());
        //     $charity->logs()->createMany($this->createLogsForUser());
        // }

        // if (User::count() < 10000) {
        //     // $users = collect(User::factory()->count(10)->unverified()->benefactor()->raw());
        //     $users = User::factory()->count(50000)->lazyRaw();

        //     $users->chunk(5000)->each(function ($chunk) {
        //         User::insertOrIgnore($chunk->toArray());
        //     });
        // }
    }

    private function createLogsForUser(): array
    {
        return Log::factory()->count(500)->raw();
    }
}