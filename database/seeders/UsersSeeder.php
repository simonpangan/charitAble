<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Log;
use App\Models\Role;
use App\Models\User;
use App\Models\Charity\Charity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        User::firstOrCreate(
            [
                'email' => 'admin@yahoo.com',
                'role_id' => Role::USERS['ADMIN'],
                'email_verified_at' => Carbon::now(config('app.timezone')),
                'password' => Hash::make('simonpangan'),
                'created_at' => '2021-06-18 01:15:48',
            ]
        );


        $benefactor = User::firstOrCreate(
            [
                'email' => 'simonjoseph.pangan@gmail.com',
                'role_id' => Role::USERS['BENEFACTOR'],
                'email_verified_at' => Carbon::now(config('app.timezone')),
                'password' => Hash::make('simonpangan'),
                'created_at' => '2021-06-18 01:15:48',
            ]
        );
        
        $benefactor->logs()->createMany($this->createLogsForUser());
        
        $benefactor->benefactor()->create([
            'first_name' => 'Simon Joseph',
            'last_name' => 'Pangan',
            'gender' => 'Male', 
            'age' => '22',
            'city' => 'Valenzuela',
            'preferences' => [ 1, 2, 3 ,4 ,5],
        ]);

        $charity = User::firstOrCreate(
            ['email' => 'charity@gmail.com'],
            [
                'email' => 'charity@gmail.com',
                'role_id' => Role::USERS['CHARITY_SUPER_ADMIN'],
                'email_verified_at' => Carbon::now(config('app.timezone')),
                'address' => "1012 Sta. Maria St., Malinta",
                'location_id' => 1,
                'password' => Hash::make('charity'),
                'created_at' => '2021-06-18 01:15:48',
            ]
        );

        $charity->logs()->createMany($this->createLogsForUser());
        
        $charity->charity()->create(Charity::factory()->raw());
        

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
        return Log::factory()->count(1000)->raw();
    }
}