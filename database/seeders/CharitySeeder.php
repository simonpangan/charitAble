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

        $categories = Categories::all()->pluck('id');

        if (Charity::count() < 30) 
        {
            $users = User::factory()
                ->count(30)
                ->charitySuperAdmin()
                ->create();

            $users->each(function ($user, $key) use (&$userFollowing, $categories) {
                $charity = Charity::factory()
                    ->logo("http://i.cdn.turner.com/nba/nba/.element/img/1.0/teamsites/logos/teamlogos_500x500/" 
                        . $this->nbaTeamsLogos()[$key] . ".png")
                    ->create(['id' => $user->id]);

                // attach 3 categories per fake charity
                $charity->categories()->attach(
                    $categories->random(3)
                );
            });
        }
    }

    private function nbaTeamsLogos() 
    {
        return [
            "atl", "bkn", "bos", "cha", "chi", "cle", "dal", "den",
            "det", "gsw", "hou", "ind", "lac", "lal", "mem", "mia", 
            "mil", "min", "nop", "nyk", "okc", "orl", "phi", "phx", 
            "por", "sac", "sas", "tor", "uta", "was",
        ];
    }
}