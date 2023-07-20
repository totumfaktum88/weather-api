<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::create([
            "name" => "Bécs",
            "latitude" => 16.37306,
            "longitude" => 48.20833
        ]);

        City::create([
            "name" => "Budapest",
            "latitude" => 19.05028,
            "longitude" => 47.47194
        ]);

        City::create([
            "name" => "Debrecen",
            "longitude" => 47.53000,
            "latitude" => 21.63917,
        ]);

    }
}
