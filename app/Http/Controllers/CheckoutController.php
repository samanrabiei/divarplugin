<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function showForm()
    {
        // فرم ورود اطلاعات پرداخت
        return view('divar.checkout.checkout');
    }

    public function processForm(Request $request)
    {
        // ولیدیت کردن داده‌ها
        $request->validate([
            'amount' => 'required|numeric|min:1000',
            'currency' => 'required|in:toman,rial',
        ]);

        // اطلاعات معتبر، حالا می‌تونیم به صفحه نمایش ارسال کنیم
        $data = [
            'amount' => $request->amount,
            'currency' => $request->currency,
        ];

        return view('checkout.summary', compact('data'));
    }
}
