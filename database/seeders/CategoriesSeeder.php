<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Charity\Charity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categories::insert([
            ['name' => 'Animal Conservation'],
            ['name' => 'Agriculture'],
            ['name' => 'Animal Conservation'],
            ['name' => 'Children and Youth'],
            ['name' => 'Community Development'],
            ['name' => 'Education'],
            ['name' => 'Environment'],
            ['name' => 'Wildlife Protection'],
            ['name' => 'Women\'s Empowerment'],
        ]);
    }
}
