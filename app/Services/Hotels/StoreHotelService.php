<?php

namespace App\Services\Hotels;

use App\Models\Hotel;
use Illuminate\Support\Arr;

class StoreHotelService
{
    protected Hotel $hotel;

    public function execute(array $data) : Hotel
    {
        $this->storeHotel(Arr::only($data, ['city_id', 'country_code', 'price', 'name']));
        $this->storeRooms(Arr::get($data, 'rooms', []));
        return $this->hotel->load('rooms') ;
    }

    private function storeHotel(array $data)
    {
        $this->hotel = Hotel::create($data);
    }

    private function storeRooms($rooms)
    {
        $this->hotel->rooms()->createMany($rooms);
    }
}
