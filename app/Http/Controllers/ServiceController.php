<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function shahkarinquiry()
    {
        return view('divar.services.shahkarinquiry');
    }

    public function shahkarinquirydata(Request $request)
    {

        $request->validate([
            'phone' => 'required|regex:/^09\d{9}$/',
            'codemele' => 'required|digits:10',
        ]);
        // ساخت یک شناسه‌ی منحصربه‌فرد برای تراکنش
        $transactionId = uniqid('txn_');
        // ذخیره اطلاعات در session
        session([
            "transactions.$transactionId" => [
                'phone' => $request->phone,
                'codemele' => $request->codemele,
            ],
        ]);

   
    }
}
