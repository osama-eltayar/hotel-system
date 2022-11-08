<?php


namespace App\Services\Auth;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginService
{
    public function execute($data): User
    {
        $user = User::query()
                    ->where('email', $data['email'])
                    ->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages([
                                                        'email' => [__('auth.failed')],
                                                    ]);
        }

        return $user;
    }
}
