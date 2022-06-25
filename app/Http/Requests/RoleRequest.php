<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:2|max:255|unique:roles,name',
            'permissions' => 'required',
            'permissions.*' => 'required|integer|exists:permissions,id',
        ];
    }
}
