<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3|max:20|string',
            //'phone' => 'required|max:12|string',
            'email' => 'required|min:5|max:60|email|unique:users,email',
            'image' => 'image|mimes:jpg,jpeg,png,bmp',
            'description' => 'nullable|string|max:512',
            'role_id' => 'required|int|min:1|exists:roles,id',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'Поле ":attribute" является обязательным для заполнения.',
            '*.email' => 'Проверьте корректность :attribute.',
            '*.min' => 'Длина ":attribute" должна быть не менее :min символов.',
            '*.max' => 'Длина ":attribute" должна быть не более :max символов.',
            '*.string' => 'Поле ":attribute" должно быть строкой.',
            '*.unique' => 'Данный :attribute уже занят.',
            '*.mimes' => 'Поле ":attribute" должно иметь один из перечисленных форматов: jpg, jpeg, png, bmp.',
            '*.int' => 'Поле ":attribute" должно быть целым числом.',
            '*.image' => 'Поле ":attribute" должно быть изображением.',
            '*.confirmed' => 'Пароли не совпадают.',
        ];
    }
}
