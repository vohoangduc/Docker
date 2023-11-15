<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\BaseRequest;

class LoginRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'    => 'required|string|max:50|email:rfc,dns',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Emai is required',
            'email.string' => 'Emai is string',
            'email.max' => 'Emai max 50 characters',
            'email.password' => 'Emai is password',
        ];
    }
}
