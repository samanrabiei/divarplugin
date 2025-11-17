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
}
