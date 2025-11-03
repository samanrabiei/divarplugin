<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class CheckoutController extends Controller
{
    public function showForm($transactionId)
    {
        $transaction = session("transactions.$transactionId");
        // dd($transaction);
        if (!$transaction) {
            abort(404, 'تراکنش یافت نشد.');
        }

        return view('divar.checkout.checkout', compact('transaction'));
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

    public function payement()
    {


        $invoice = (new Invoice)->amount(1000); // مبلغ به ریال

        return Payment::via('zibal')->purchase($invoice, function ($driver, $transactionId) {

            // ذخیره تراکنش

        })->pay()->render();
    }
}
