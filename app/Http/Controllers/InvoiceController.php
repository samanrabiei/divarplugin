<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Illuminate\Support\Facades\Auth;




class InvoiceController extends Controller
{
    public function create()
    {
        return view('invoice.create');
    }

    public function pay(Request $request)
    {
        $gateway = 'zibal';
        // اعتبارسنجی ساده (اختیاری اما پیشنهاد می‌شود)
        $request->validate([
            'price' => 'required|numeric|min:0.01',
            'transactions_id' => 'required',
        ]);

        $invoice = (new Invoice)->amount($request->price);
        return Payment::via($gateway)->purchase($invoice, function ($driver, $transactionId) use ($request, $gateway) {
            // دقت کن که بین "payment." و $transactionId فاصله نداشته باشه
            session([
                "payment.$transactionId" => [
                    'transionpayid' => $transactionId,
                    'transactions_id' => $request->transactions_id,
                    'amount' => $request->price,
                    'gateway' => $gateway,
                    'type' =>  $request->type,
                ],
            ]);
        })->pay()->render();
    }


    public function callback(Request $request)
    {
        $trackId = $request['trackId'];
        try {
            // Verify و گرفتن receipt
            $receipt = Payment::amount(0)
                ->transactionId($trackId)
                ->verify();
            $amount = $receipt->getDetail('amount');
            $pay_session = session()->get("payment.$trackId");

            if ($pay_session['amount'] * 10 == $amount) {
                // پرداخت موفق بود
                $id_transction =  $pay_session['transactions_id'];
                // session()->forget("payment.$trackId");
                //دریافت اطلاعات سفارش 
                $transactions = session()->get("transactions.$id_transction");
                if ($transactions['type'] == 'wallet') {
                    $id =  Auth::id();
                    $user = User::find($id);
                    $user->deposit($pay_session['amount']);

                    session()->flash('success', [
                        'title' => 'انجام شد',
                        'message' => 'شارژ کیف پول با موفقیت انجام شد.'
                    ]);
                    return redirect()->route('profile.profile');
                } else {
                    return redirect()->route('services.shahkarinquiryrequiest', ['transicon' =>  $transactions['transactions_id']]);
                }
            } else {
                session()->flash('error', [
                    'title' => 'انجام نشد',
                    'message' => 'پرداخت انجام نشد لطفا مجددا امتحان  نمایید.'
                ]);
                return redirect()->route('profile.profile');
            }
        } catch (InvalidPaymentException $exception) {

            session()->flash('error', [
                'title' => 'انجام نشد',
                'message' => $exception->getMessage()
            ]);
            return redirect()->route('profile.profile');
        }
    }
}
