<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Api\RegisterRequest;
use App\Models\User;

class RegisterController extends BaseController
{
    public function register(RegisterRequest $request)
    {
        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return $this->sendSuccessResponse('Create user successfully', $data);
    }
}
