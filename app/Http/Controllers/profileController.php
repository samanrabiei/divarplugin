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
            'wallet' => number_format($data->balance)
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

        $serviceId = uniqid('txn_');

        session([
            "service.$serviceId" => [
                'price' => $request->amount,
                'serviceId' => $serviceId,
                'type' => 'wallet'

            ],
        ]);

        return redirect()->route('checkout.showForm', ['serviceId' => $serviceId]);
    }
}
