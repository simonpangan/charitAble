<?php

namespace Database\Seeders;

use App\Models\Log;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Log::create([
        //     'user_id' => 1, 
        //     'activity' => "You have login into our system", 
        //     'created_at' => now(), 
        // ]);

        // Log::create([
        //     'user_id' => 1, 
        //     'activity' =>  Crypt::encryptString("You have login into our system"), 
        //     'created_at' => now(), 
        // ]);

        // Log::create([
        //     'user_id' => 1, U
        //     'activity' =>  Crypt::encryptString("1"), 
        //     'created_at' => now(), 
        // ]);
    }
}
