<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Log;
use App\Models\Role;
use App\Models\User;
use App\Models\Categories;
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
        User::firstOrCreate(
            [
                'email' => 'charitable439@gmail.com',
                'role_id' => Role::USERS['ADMIN'],
                'email_verified_at' => Carbon::now(config('app.timezone')),
                'password' => Hash::make('Charitable#2022'),
                'created_at' => '2021-06-18 01:15:48',
            ]
        );


        $benefactor = User::firstOrCreate(
            [
                'email' => 'benefactor@gmail.com',
                'role_id' => Role::USERS['BENEFACTOR'],
                'email_verified_at' => Carbon::now(config('app.timezone')),
                'password' => Hash::make('benefactor'),
                'created_at' => '2021-06-18 01:15:48',
            ]
        );
        
        $benefactor->logs()->createMany($this->createLogsForUser());
        
        $benefactor->benefactor()->create([
            'first_name' => 'Simon Joseph',
            'last_name' => 'Pangan',
            'gender' => 'Male', 
            'birth_date' => now(),
            'preferences' => [ 1, 2, 3 ,4 ,5],
        ]);

        $charity = User::firstOrCreate(
            ['email' => 'charity@gmail.com'],
            [
                'email' => 'charity@gmail.com',
                'role_id' => Role::USERS['CHARITY_SUPER_ADMIN'],
                'email_verified_at' => Carbon::now(config('app.timezone')),
                'address' => "1012 Sta. Maria St., Malinta",
                'location_id' => 6,
                'password' => Hash::make('charity'),
                'created_at' => '2021-06-18 01:15:48',
            ]
        );


        $charity->logs()->createMany($this->createLogsForUser());
        
        $charityuser = $charity->charity()->create(
            array_merge(Charity::factory()->raw(), [
                'charity_verified_at' => now(),
                'eth_address' => '0x30E54C2b235A15724d69Ac69855Fbd0A4E42E286',
                'logo' => 'http://i.cdn.turner.com/nba/nba/.element/img/1.0/teamsites/logos/teamlogos_500x500/okc.png',
            ])
        );

        $categories = Categories::all()->pluck('id');

        $charityuser->categories()->attach(
            $categories->random(3)
        );
        
    }

    private function createLogsForUser(): array
    {
        return Log::factory()->count(1000)->raw();
    }
}