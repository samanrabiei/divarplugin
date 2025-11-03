<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;



class InvoiceController extends Controller
{
    public function create()
    {
        return view('invoice.create');
    }

    public function pay(Request $request)
    {
        dd($request->all());

        $invoice = (new Invoice)->amount($request['price']);
        return Payment::purchase($invoice, function ($driver, $transactionId) {})->pay()->render();
        return Payment::purchase(
            (new Invoice)->amount($request['price']),
            function ($driver, $transactionId) {}
        )->pay()->render();
        return Payment::purchase(
            (new Invoice)->amount($request['price']),
            function ($driver, $transactionId) {}
        )->pay()->toJson();
    }

    public function callback(Request $request)
    {
        $trackId = $request['trackId'];
        try {
            $receipt = Payment::amount(1000)->transactionId($trackId)->verify();
            dd($receipt);
        } catch (InvalidPaymentException $exception) {

            dd($exception->getMessage());
        }
    }
}
