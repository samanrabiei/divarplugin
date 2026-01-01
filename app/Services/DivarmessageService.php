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
        $response = Http::withHeaders([
            'Content-Type'  => 'application/json',
            'X-Api-Key'     => env('API_KEY'),
            'Authorization' => 'Bearer ' .  $token,
        ])->post("https://open-api.divar.ir/v1/open-platform/chat/bot/users/{$userHash}/messages", [
            'type' => 'TEXT',
            'text_message' => 'hello, World!',
            'buttons' => [
                'rows' => [
                    [
                        'buttons' => [
                            [
                                'action' => [
                                    'open_direct_link' => 'آدرس مورد نظر برای باز شدن بعد از کلیک'
                                ],
                                'icon_name' => 'REAL_STATE',
                                'caption' => 'متن دکمه'
                            ],
                            [
                                'action' => [
                                    'open_server_link' => [
                                        'data' => [
                                            'my_key_1' => 'value',
                                            'my_key_2' => 'value2'
                                        ]
                                    ]
                                ],
                                'icon' => 'HOME',
                                'caption' => 'متن دکمه'
                            ]
                        ]
                    ]
                ]
            ]
        ]);

        // بررسی نتیجه
        if ($response->successful()) {
            $result = $response->json();
        } else {
            $error = $response->body();
        }
    }
}
