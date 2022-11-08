<?php

namespace Database\Seeders;

use App\Models\City;
use Database\Factories\CityFactory;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::factory()
            ->count(5)
            ->hasHotels(10)
            ->create();
    }
}
