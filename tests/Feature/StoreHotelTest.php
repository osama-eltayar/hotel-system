<?php

namespace Tests\Feature;

use App\Models\City;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreHotelTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_store_hotel()
    {
        $user = User::factory()->create();
        $city = City::factory()->create();
        $hotelData = [
            'name' => 'first' ,
            'country_code' => 'coe',
            'city_id' => $city->id ,
            'price' => 50
        ];
        $response = $this->actingAs($user)
                         ->postJson('/api/hotels',$hotelData);

        $response->assertStatus(200)
                 ->assertJson(['data' => $hotelData]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_cant_store_hotel_without_name()
    {
        $user = User::factory()->create();
        $city = City::factory()->create();
        $hotelData = [
            'country_code' => 'coe',
            'city_id' => $city->id ,
            'price' => 50
        ];
        $response = $this->actingAs($user)
                         ->postJson('/api/hotels',$hotelData);

        $response->assertStatus(422);
    }
}
