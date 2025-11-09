<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();

        return view('divar.profile.profile', compact('user'));
    }
    public function wallet(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $amount = $request->query('amount');

        // اینجا ریدایرکت ساده به آدرس پرداخت (جایگزین کن)
        $gatewayUrl = "https://gateway.example.com/pay?amount={$amount}";

        return redirect()->away($gatewayUrl);
    }
}
