<?php

namespace App\Http\Requests;

use App\Exceptions\APIException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class APIRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            //
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new APIException(422, 'Validation error', $validator->errors());
    }
}
