<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostAddRequest extends FormRequest
{
    public function authorize()
    {
        return auth("web")->check();
    }

    public function rules()
    {
        return [
            'post_type_id' => 'required|int|min:1|exists:post_types,id',
            'name' => 'required|string|min:3|max:40',
            'city_id' => 'required|int|min:1|exists:cities,id',
            'category_id' => 'required|int|min:1|exists:categories,id',
            'education_id' => 'required|int|min:1|exists:educations,id',
            'salary' => 'nullable|string|max:10',
            'work_experience_id' => 'required|int|min:1|exists:work_experiences,id',
            'description' => 'required|string|min:1|max:1500',
            'work_schedule_id' => 'required|int|min:1|exists:work_schedules,id',
            'contacts' => 'required|string|min:1|max:100',
            'image' => 'image|mimes:jpg,jpeg,png,bmp',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'Поле ":attribute" является обязательным для заполнения.',
            '*.min' => 'Длина ":attribute" должна быть не менее :min символов.',
            '*.max' => 'Длина ":attribute" должна быть не более :max символов.',
            '*.string' => 'Поле ":attribute" должно быть строкой.',
            '*.mimes' => 'Поле ":attribute" должно иметь один из перечисленных форматов: jpg, jpeg, png, bmp.',
            '*.int' => 'Поле ":attribute" должно быть целым числом.',
            '*.image' => 'Поле ":attribute" должно быть изображением.',
            '*.exists' => 'Поле ":attribute" некорректно.'
        ];
    }
}
