<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Api\LoginRequest;
use App\Models\User;
use Illuminate\Http\Response;

class LoginController extends BaseController
{
    public function login(LoginRequest $request)
    {

        $credentials = $request->only('email', 'password');

        if (!$token = auth()->attempt($credentials)) {
            return $this->sendError(__('login failed'), Response::HTTP_BAD_REQUEST);
        }

        $data = [
            'token' => $token,
            'token_type' => 'bearer'
        ];

        return $this->sendSuccessResponse('Login successfully', $data);
    }
}
