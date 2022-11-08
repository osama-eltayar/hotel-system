<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\TokenResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\Auth\RegisterService;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     * @param RegisterRequest $registerRequest
     * @param RegisterService $registerService
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RegisterRequest $registerRequest,RegisterService $registerService)
    {
        $user = $registerService->execute($registerRequest->validated());

        $token = $user->createToken($registerRequest->device ?? User::DEFAULT_DEVICE);

        return new SuccessResource([
                                       'token' => new TokenResource($token),
                                       'user'  => new UserResource($user)
                                   ]);

    }
}
