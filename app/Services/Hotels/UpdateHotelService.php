<?php

namespace App\Services\Hotels;

use App\Models\Hotel;
use Illuminate\Support\Arr;

class UpdateHotelService
{
    protected Hotel $hotel;

    public function execute(array $data,Hotel $hotel) : Hotel
    {
        $this->attachHotel($hotel);
        $this->storeHotel(Arr::only($data, ['city_id', 'country_code', 'price', 'name']));
        $this->storeRooms(Arr::get($data, 'rooms', []));
        return $this->hotel ;

    }

    private function storeHotel(array $data)
    {
        $this->hotel->update($data);
    }

    private function storeRooms($rooms)
    {
        $this->hotel->rooms()->createMany($rooms);
    }

    private function attachHotel(Hotel $hotel)
    {
        $this->hotel = $hotel ;
    }
}
