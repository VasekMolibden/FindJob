<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostTypeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'post_type' => 'required|min:2|max:60|string|unique:post_types,post_type',
        ];
    }
}
