<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array
     */
    public function definition()
    {
        return [
            'name'         => $this->faker->unique()->name,
            'country_code' => $this->faker->countryCode,
            'city_id'      => City::query()->inRandomOrder()->first()->id,
            'price'        => $this->faker->numberBetween(10, 500)
        ];
    }
}
