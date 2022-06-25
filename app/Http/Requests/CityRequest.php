<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'city' => 'required|min:2|max:60|string',
            'region_id' => 'required|int|min:1|exists:regions,id',
        ];
    }
}
