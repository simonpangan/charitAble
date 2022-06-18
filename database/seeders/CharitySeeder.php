<?php
namespace Database\Seeders;

use App\Models\User;
use App\Models\Benefactor;
use App\Enums\CharityCategory;
use App\Models\Categories;
use App\Models\Charity\Charity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Charity\CharityCategories;
use App\Models\Charity\CharityFollowers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CharitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (! Categories::count()) {
            $categories = collect(CharityCategory::cases())
                ->pluck('value')
                ->map(function($value) {
                    return ['name' => $value];
                })
                ->toArray();

            DB::table('categories')
                ->insert($categories);
        }

        $userFollowing = array();
        $categories = Categories::all()->pluck('id');
        $benefactorID = User::where('email', 'simonpangan@yahoo.com')->first(['id'])->id;

        if (Charity::count() < 1000) 
        {
            $users = User::factory()->count(100)->charitySuperAdmin()->create();

            $users->each(function ($user) use ($benefactorID, &$userFollowing, $categories) {
                Charity::factory()->create(['id' => $user->id]);
            });
        }
        
        CharityFollowers::insert($userFollowing);
    }
}