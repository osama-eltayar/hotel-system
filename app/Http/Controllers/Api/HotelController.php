<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\HotelRequest;
use App\Http\Resources\HotelResource;
use App\Http\Resources\SuccessResource;
use App\Models\Hotel;
use App\Services\Hotels\DeleteHotelService;
use App\Services\Hotels\StoreHotelService;
use App\Services\Hotels\UpdateHotelService;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $hotels = Hotel::filter($request->get('filters',[]))
                       ->sort($request->get('sorts',[]))
                       ->paginate();
        return HotelResource::collection($hotels);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HotelRequest $request,StoreHotelService $hotelService)
    {
        $hotel = $hotelService->execute($request->validated());
        return new SuccessResource(new HotelResource($hotel));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        return new SuccessResource(new HotelResource($hotel->load('rooms')));
    }

    /**
     * Update the specified resource in storage.
     * @param HotelRequest $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(HotelRequest $request, Hotel $hotel, UpdateHotelService $hotelService)
    {
        $hotel = $hotelService->execute($request->validated(),$hotel);
        return new SuccessResource(new HotelResource($hotel));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel, DeleteHotelService $hotelService)
    {
        $hotelService->execute($hotel);
        return new SuccessResource([],__('deleted succesful'));
    }
}
