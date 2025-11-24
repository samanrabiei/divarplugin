<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class Authentication extends Controller
{

    public function admin()
    {
        // چک کردن اگر کاربر وارد بود به این لینک ریدارکت شود
        if (auth()->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.signin');
    }

    public function submitlogin(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|string|email|exists:users,email',
            'password' => 'required|string|min:3',
        ]);

        $user = User::where('email', $data['email'])->first();

        // اگر کاربر وجود نداشت
        if (!$user) {
            return back()->withErrors(['email' => 'اطلاعات ورود اشتباه است.']);
        }

        // بررسی رمز عبور با Hash::check
        if (Hash::check($data['password'], $user->password) and $user->is_admin === 1) {

            Auth::login($user);
            return redirect()->route('admin.dashboard');
        } else {

            return back()->withErrors(['email' => 'اطلاعات ورود اشتباه است.']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return  redirect()->route('admin');
    }

    public function resetPassword(Request $request)
    {
        return view('admin.auth.reset');
    }

    public function resetPasswordpost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users'
        ]);

        $email = DB::table('password_resets')->where('email', $request->email)->first();
        if ($email) {
            return redirect()->back()->with('error', 'ایمیل برای شما ارسال شده است لطفا ایمیل خود را چک نمایید.');
        }

        $token = str()->random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        Mail::send('email.resetpassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        return redirect()->back()->with('success', 'ایمیل با موفقیت برای شما ارسال شد.');
    }
    public function NewPassword($token)
    {

        return view('admin.auth.resetpassword', compact('token'));
    }

    public function SubmitNewPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:3|confirmed',
            'token' => 'required'
        ]);
        $updatepasword = DB::table('password_resets')->where('token', $request->token)->first();
        if (!$updatepasword) {
            return redirect()->back()->with('error', 'ایمیل شما معتبر نمی باشد.');
        }
        $user = User::where('email', $updatepasword->email)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'کاربر پیدا نشد.');
        }
        $user->password = bcrypt($request->password);
        $user->save();
        DB::table('password_resets')->where('email', $updatepasword->email)->delete();
        return redirect()->route('formlogin')->with('success', 'رمز عبور شما با موفقیت تغییر کرد.');
    }

    public function verifyEmail(Request $request)
    {
        // Logic for email verification
    }

    public function sendVerificationEmail(Request $request)
    {
        // Logic for sending verification email
    }
}
