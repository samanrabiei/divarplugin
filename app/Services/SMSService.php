<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SMSService
{
    // send with pattern
    public function sendVerificationCode($phone, $code)
    {
        $payload = [
            "sending_type" => "pattern",
            "from_number" => env('FORM_NUMBER'),
            "code" => env('CODE'),
            "recipients" => [$phone],
            "params" => [
                "code" => $code
            ]
        ];
        $response = Http::withHeaders([
            "Authorization" => "YTA0ODcwN2MtYjdmNy00OWI3LTkxOTItYWMyY2U1ODAwYTc0NmMwMzk5MDY3NWU1NzMyOGY0YjFjNTgyN2VhMzlmMzg=",
            "Content-Type" => "application/json",
        ])->post("https://edge.ippanel.com/v1/api/send", $payload);
        $answer = $response->json();
        if ($answer['meta']['status'] == true) {
            return true;
        } else {
            return false;
        }
    }
}
