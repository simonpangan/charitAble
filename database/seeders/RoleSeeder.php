<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (! Role::count()) {
            $userRoles = collect(Role::USERS)
                ->map(function ($item, $key) {
                    return ['id' => $item, 'name' => $key];
                })->values();

            Role::insert($userRoles->toArray());
        }
    }
}
