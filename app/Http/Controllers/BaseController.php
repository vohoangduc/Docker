<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function sendSuccessResponse($message = null, $data = null, $code = null)
    {
        $response = [
            'success' => true,
        ];

        if ($message) {
            $response['message'] = $message;
        }
        if (!is_null($data)) {
            $response['data'] = $data;
        }

        if ($code) {
            return response()->json($response, $code);
        }


        return response()->json($response);
    }

    public function sendError($message = null, $code = null)
    {
        $response = [
            'success' => false,
            'message' => $message
        ];

        if ($code) {
            return response()->json($response, $code);
        } else {
            return response()->json($response);
        }
    }
}
