<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    
    public function showForm($transactionId)
    {

        $user = Auth::user();
        $data = User::find($user['id']);

        $transaction = session("transactions.$transactionId");
        // dd($transaction);
        if (!$transaction) {
            abort(404, 'تراکنش یافت نشد.');
        }


        // dd($data->balance);

        return view('divar.checkout.checkout', [
            'transaction' =>  $transaction,
            'wallet' => number_format($data->balance)
        ]);
    }
}
