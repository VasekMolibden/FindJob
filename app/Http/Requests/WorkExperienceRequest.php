<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkExperienceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'work_experience' => 'required|min:2|max:60|string|unique:work_experiences,work_experience',
        ];
    }
}
