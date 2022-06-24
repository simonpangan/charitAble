<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::insert(
            ['name' => 'Quezon City'],
            ['name' => 'Manila'],
            ['name' => 'Caloocan'],
            ['name' => 'Taguig'],
            ['name' => 'Pasig'],
            ['name' => 'Valenzuela'],
            ['name' => 'Parañaque'],
            ['name' => 'Makati'],
            ['name' => 'Las Piñas'],
            ['name' => 'Muntinlupa'],
            ['name' => 'Marikina'],
            ['name' => 'Pasay'],
            ['name' => 'Mandaluyong'],
            ['name' => 'Malabon'],
            ['name' => 'Navotas'],
            ['name' => 'San Juan'],
            ['name' => 'Pateros'],
        );
    }
}
