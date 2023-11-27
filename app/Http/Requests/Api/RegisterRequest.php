<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\BaseRequest;

class RegisterRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'    => 'required|string|max:24|min:1',
            'email'    => 'required|string|max:50|email:rfc,dns',
            'password' => 'required|max:16|min:8',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'name is required',
            'name.string'       => 'name is string',
            'name.max'          => 'name has max 24 characters',
            'name.min'          => 'name has min 1 characters',
            'email.required'    => 'email is required',
            'email.string'      => 'email is string',
            'email.max'         => 'email has max 50 characters',
            'email.max'         => 'email max 50 characters',
            'password.required' => 'password is required',
            'password.min'      => 'password has min 8 charaters',
            'password.max'      => 'password has max 16 characters',
        ];
    }
}
