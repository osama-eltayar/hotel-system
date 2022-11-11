<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelRequest extends FormRequest
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
            'name'         => ['required', 'string', 'between:5,50'],
            'city_id'      => ['required', 'exists:cities,id'],
            'country_code' => ['required', 'string', 'between:2,5'],
            'price'        => ['required', 'integer', 'between:10,1000'],
        ];
    }
}
