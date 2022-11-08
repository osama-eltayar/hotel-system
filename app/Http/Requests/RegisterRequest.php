<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'name'     => ['required', 'string', 'between:3,150'],
            'email'    => ['required', 'email', 'unique:users,email'],
            'password' => ['required', Password::min('6')],
            'device'   => ['nullable', 'string', 'between:3,20'],
        ];
    }

}
