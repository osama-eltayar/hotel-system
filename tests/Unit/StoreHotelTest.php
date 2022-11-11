<?php

namespace Tests\Unit;

use App\Models\Hotel;
use App\Services\Hotels\StoreHotelService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreHotelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_store_hotel_service()
    {
        $data = [
            'name' => 'first',
            'country_code' => 'cmo',
            'price' => 200,
            'city_id' => 1
        ];

        $hotel = app(StoreHotelService::class)->execute($data);

        $this->assertInstanceOf(Hotel::class,$hotel);
    }
}
