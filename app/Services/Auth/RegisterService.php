<?php


namespace App\Services\Auth;


use App\Models\User;

class RegisterService
{
    public function execute($data): User
    {
        return User::create($data);
    }
}
