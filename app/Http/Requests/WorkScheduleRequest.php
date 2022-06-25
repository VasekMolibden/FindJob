<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkScheduleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'work_schedule' => 'required|min:2|max:60|string|unique:work_schedules,work_schedule',
        ];
    }
}
