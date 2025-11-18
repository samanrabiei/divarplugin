<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    public function showForm($serviceId)
    {

        $user = Auth::user();
        $data = User::find($user['id']);

        $service = session("service.$serviceId");
        // dd($transaction);
        if (!$service) {
            abort(404, 'تراکنش یافت نشد.');
        }


        // dd($data->balance);

        return view('divar.checkout.checkout', [
            'service' =>  $service,
            'wallet' => $data->balance
        ]);
    }
}
