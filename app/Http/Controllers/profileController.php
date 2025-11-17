<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class profileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        $data = User::find($user['id']);
        // dd($data->balance);


        return view('divar.profile.profile', [
            'user' => $user,
            'wallet' => $data->balance
        ]);
    }

    public function wallet(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'amount' => 'required|numeric|min:1000',
        ]);

        $data = [
            'amount' => $request->amount,
            'currency' => $request->currency,
        ];

        $transactionId = uniqid('txn_');

        session([
            "transactions.$transactionId" => [
                'price' => $request->amount,
                'transactions_id' => $transactionId,
                'type' => 'wallet'

            ],
        ]);

        return redirect()->route('checkout.showForm', ['transactionId' => $transactionId]);
    }
}
