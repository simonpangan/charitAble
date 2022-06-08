<?php

namespace Database\Seeders;

use App\Enums\CharityCategory;
use Illuminate\Database\Seeder;
use App\Models\Charity\CharityCategories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class CharitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (! DB::table('categories')->count()) {
            $categories = collect(CharityCategory::cases())
                ->pluck('value')
                ->map(function($value) {
                    return ['name' => $value];
                })
                ->toArray();

            DB::table('categories')
                ->insert($categories);
        }
       
    }
}
