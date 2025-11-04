<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class OtpLoginController extends Controller
{
    // نمایش فرم وارد کردن شماره موبایل
    public function showPhoneForm()
    {
        return view('divar.auth.login');
    }

    // ارسال کد تایید
    public function sendOtp(Request $request)
    {
        $request->validate([
            'phone' => 'required|digits:11',
            'gavanin' => 'required|accepted',
        ]);

        $phone = $request->phone;

        // بررسی زمان آخرین ارسال OTP
        if (Session::has('otp_sent_at')) {
            $lastSent = Session::get('otp_sent_at');
            $diff = now()->diffInSeconds($lastSent);

            if ($diff < 120) {
                $remaining = 120 - $diff;
                return back()->withErrors([
                    'phone' => "لطفاً $remaining ثانیه دیگر برای ارسال مجدد کد منتظر بمانید.",
                ])->withInput();
            }
        }

        // تولید کد و ذخیره در سشن
        $otp = rand(100000, 999999);
        Session::put('otp', $otp);
        Session::put('phone', $phone);
        Session::put('otp_sent_at', now()); // ذخیره زمان ارسال

        // نمایش OTP برای تست
        return redirect()->route('otp.verify.form')->with('status', "$phone - کد ورود شما: $otp");
    }

    // نمایش فرم وارد کردن کد
    public function showVerifyForm()
    {
        return view('divar.auth.otp');
    }

    // بررسی کد واردشده
    public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => 'required|numeric']);

        $otp = Session::get('otp');
        $phone = Session::get('phone');

        if ($otp == $request->otp) {

            // بررسی وجود کاربر با شماره موبایل
            $user = User::where('phone', $phone)->first();

            // اگر کاربر وجود نداشت، ثبت‌نام کن
            if (!$user) {
                $user = User::create([
                    'name' => $phone,
                    'phone' => $phone,
                    'password' => bcrypt($phone),
                    'role_id' => '2',
                ]);
            }

            // ورود کاربر
            Auth::login($user);

            // پاک کردن سشن OTP
            Session::forget(['otp', 'phone']);

            return redirect('/')->with('success', 'با موفقیت وارد شدید');
        }

        return back()->withErrors(['otp' => 'کد واردشده اشتباه است']);
    }


    // خروج از حساب
    public function logout()
    {
        Auth::logout();
        return redirect()->route('otp.phone.form');
    }
}
