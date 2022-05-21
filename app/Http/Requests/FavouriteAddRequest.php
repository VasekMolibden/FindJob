<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FavouriteAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth("web")->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required|int|min:1|exists:users,id',
            'post_id' => 'required|int|min:1|exists:posts,id',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'Поле ":attribute" является обязательным для заполнения.',
            '*.min' => 'Длина ":attribute" должна быть не менее :min символов.',
            '*.int' => 'Поле ":attribute" должно быть целым числом.',
            '*.exists' => 'Поле ":attribute" некорректно.'
        ];
    }
}
