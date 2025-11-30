<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DivarMessageService
{
    public function sendDivarMessage($message)
    {
        $user = Auth::user();
        $user_data = User::find($user['id']);
        $userHash =  $user_data['name'];
        $token = $user_data['token'];
        //
        $payload = [
            "type" => "TEXT",
            "text_message" =>  $message,
            // "buttons" => [
            //     "rows" => [
            //         [
            //             "buttons" => [
            //                 [
            //                     "action" => [
            //                         "open_direct_link" => "https://narin-web.ir"
            //                     ],
            //                     "icon_name" => "",
            //                     "caption" => "متن دکمه"
            //                 ],
            //                 [
            //                     "action" => [
            //                         "open_server_link" => [
            //                             "data" => [
            //                                 "my_key_1" => "value",
            //                                 "my_key_2" => "value2"
            //                             ]
            //                         ]
            //                     ],
            //                     "icon" => "HOME",
            //                     "caption" => "متن دکمه"
            //                 ],
            //             ]
            //         ]
            //     ]
            // ]
        ];
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'X-Api-Key'    => env('API_KEY'),      // از env بخوان
            'Authorization' => 'Bearer' . ' ' .  $token,   // از env بخوان
        ])->post("https://open-api.divar.ir/v1/open-platform/chat/bot/users/{$userHash}/messages", $payload);

        $json = $response->json();

        if ($json['conversation_id']) {
            return true;
        } else {
            return false;
        }
    }
}
