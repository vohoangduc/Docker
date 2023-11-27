<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

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

        /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendEmail($page, $toEmail, $bccEmail, $data, $title)
    {
       try {
           $email = config('mail.from')['address'];
            $name_email = config('mail.from')['name'];
            Mail::send($page, $data, function ($message) use ($toEmail, $bccEmail, $email, $name_email, $title) {
                $message->from($email, $name_email)
                    ->subject($title);
                    $message->to($toEmail);

                    if (!empty($bccEmail)) {
                        $message->bcc($bccEmail);
                    }

            });

       } catch (\Exception $e) {
        
            logger($e->getMessage());
       }
    }
}
