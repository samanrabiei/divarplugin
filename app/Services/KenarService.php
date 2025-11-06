<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class KenarService
{

    public function phone($data)
    {

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $data,   // متغیر یا ورودی توکن
            'x-api-key'     => env('API_KEY'),
            'Content-Type'  => 'application/json',
        ])->get('https://open-api.divar.ir/v1/open-platform/users'); // GET

        return $response->json();
    }
}
