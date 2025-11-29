<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Services\KenarService;

class KenarOauthController extends Controller
{
    public function redirectToKenar(Request $request)
    {
        $baseUrl = "https://oauth.divar.ir/oauth2/auth";

        $query = http_build_query([
            'response_type' => 'code',
            'client_id'     => env('CLIENT_ID'),
            'redirect_uri'  => env('REDIRECT_URI'),
            'scope'         => env('SCOPE'),
            'state'         => csrf_token(), // بهتره این باشه برای امنیت
        ]);

        return redirect($baseUrl . '?' . $query);
    }

    public function handleCallback(Request $request)
    {
        // اگر خطا بود (کاربر رد کرد)
        if ($request->has('error')) {
            return  redirect()->route('otp.phone.form');
        }

        // دریافت code از Callback
        $code = $request->get('code');

        if (!$code) {
            return  redirect()->route('otp.phone.form');
        }

        // ارسال درخواست برای دریافت توکن
        $response = Http::asForm()->post('https://oauth.divar.ir/oauth2/token', [
            'code'          => $code,
            'client_id'     => env('CLIENT_ID'),
            'client_secret' => env('CLIENT_SECRET'),
            'grant_type'    => 'authorization_code',
            'redirect_uri'  => env('REDIRECT_URI'),
        ]);

        // بررسی موفقیت درخواست
        if ($response->failed()) {
            return  redirect()->route('otp.phone.form');
        }

        // پاسخ شامل access_token و ... 
        $data = $response->json();



        $kenar = new KenarService;
        $result = $kenar->phone($data['access_token']);

        $mobile_user = $result['phone_number'];


        // ساخت یا آپدیت کاربر
        $user = User::updateOrCreate(
            ['phone' => $mobile_user], // شرط پیدا کردن کاربر
            [
                'name' =>  $result['user_id'],  // یا هر چیزی که دوست داری
                'password' => bcrypt($mobile_user), // بهتره بعداً برابر نذاری
                'role_id' => 2,
                'token' => $data['access_token'],
                'token_expires_at' => $data['expires_in']
            ]
        );

        // ورود کاربر
        Auth::login($user);

        // پاک کردن سشن OTP و شماره
        Session::forget(['otp', 'phone']);

        return redirect('/')->with('success', 'با موفقیت وارد شدید');
    }
}
