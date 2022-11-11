<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\HotelRequest;
use App\Http\Resources\HotelResource;
use App\Http\Resources\SuccessResource;
use App\Models\Hotel;
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
    public function store(HotelRequest $request)
    {
        $hotel = Hotel::create($request->validated());
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
        return new SuccessResource(new HotelResource($hotel));
    }

    /**
     * Update the specified resource in storage.
     * @param HotelRequest $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(HotelRequest $request, Hotel $hotel)
    {
        $hotel->update($request->validated());
        return new SuccessResource(new HotelResource($hotel));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return new SuccessResource([],__('deleted succesful'));
    }
}
