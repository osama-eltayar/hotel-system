<?php

namespace App\Http\Controllers\Api\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\TokenResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\Auth\LoginService;

class LoginController extends Controller
{
    public function login(LoginRequest $loginRequest, LoginService $loginService)
    {
        $user  = $loginService->execute($loginRequest->validated());
        $token = $user->createToken($loginRequest->device ?? User::DEFAULT_DEVICE);

        return new SuccessResource([
                                       'token' => new TokenResource($token),
                                       'user'  => new UserResource($user)
                                   ]);

    }


}
