<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class TokenResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'access_token' => Str::after($this->plainTextToken, '|'),
            'expired_at'   => $this->getTokenExpirationTime($this),
            'type'         => 'Bearer'
        ];
    }

    private function getTokenExpirationTime($token)
    {
        if ( !config('sanctum.expiration') )
            return null;

        return Carbon::parse($token->accessToken->create_at);
    }
}
