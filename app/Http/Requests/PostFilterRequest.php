<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'text' => 'nullable|string',
            'post_type_id' => 'nullable|int|min:1|exists:post_types,id',
            'salary_from' => 'nullable|numeric|min:0|max:9999999',
            'salary_to' => 'nullable|numeric|min:0|max:9999999',
            'city_id.*' => 'nullable|int|min:1|exists:cities,id',
            'category_id.*' => 'nullable|int|min:1|exists:categories,id',
            'education_id.*' => 'nullable|int|min:1|exists:educations,id',
            'work_experience_id.*' => 'nullable|int|min:1|exists:work_experiences,id',
            'work_schedule_id.*' => 'nullable|int|min:1|exists:work_schedules,id',
        ];
    }

    public function messages()
    {
        return [
            '*.min' => 'Поле ":attribute" должно быть не менее :min.',
            '*.max' => 'Поле ":attribute" должно быть не более :max.',
            '*.string' => 'Поле ":attribute" должно быть строкой.',
            '*.numeric' => 'Поле ":attribute" должно быть числом.',
            '*.*.min' => 'Длина поля ":attribute" должна быть не менее :min символа.',
            '*.*.int' => 'Поле ":attribute" должно быть целым числом.',
            '*.*.integer' => 'Поле ":attribute" должно быть целым числом.',
            '*.*.exists' => 'Поле ":attribute" некорректно.'
        ];
    }

    public function attributes()
    {
        return [
            'text.*' => 'поиск',
            'post_type_id.*' => 'тип публикации',
            'salary_from.*' => 'зарплата',
            'salary_to.*' => 'зарплата',
            'city_id.*' => 'город',
            'category_id.*' => 'категория',
            'education_id.*' => 'образование',
            'work_experience_id.*' => 'опыт работы',
            'work_schedule_id.*' => 'график работы',
        ];
    }
}
