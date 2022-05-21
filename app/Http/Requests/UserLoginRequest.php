<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|min:5|max:60|email',
            'password' => 'required|min:5|max:40',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'Поле ":attribute" является обязательным для заполнения.',
            '*.email' => 'Проверьте корректность ":attribute".',
            '*.min' => 'Длина ":attribute" должна быть не менее :min символов.',
            '*.max' => 'Длина ":attribute" должна быть не более :max символов.',
        ];
    }
}
