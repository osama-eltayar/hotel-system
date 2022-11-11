<?php

namespace App\Services\Hotels;

use App\Models\Hotel;

class DeleteHotelService
{
    public function execute(Hotel $hotel)
    {
        $hotel->rooms()->delete();
        $hotel->delete() ;
    }
}
