<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private $merchant = 'zibal'; // تو حالت تست
    private $callbackUrl = 'http://127.0.0.1:8000/payment/callback';

    public function send(Request $request)
    {
        $amount = $request->input('amount');
        $orderId = $request->input('order_id');

        $params = [
            'merchant'    => $this->merchant,
            'callbackUrl' => $this->callbackUrl,
            'amount'      => $amount,
            'orderId'     => $orderId,
            'mobile'      => '09120000000',
        ];

        $response = $this->postToZibal('request', $params);
       
        if ($response->result == 100) {
            $gatewayUrl = 'https://gateway.zibal.ir/start/' . $response->trackId;
            $answer = redirect()->away($gatewayUrl);
            dd($answer);
        } else {
            return response()->json([
                'errorCode' => $response->result,
                'message' => $response->message ?? 'خطای ناشناخته',
            ]);
        }
    }

    public function callback(Request $request)
    {
        if ($request->get('success') == 1) {
            $trackId = $request->get('trackId');

            $params = [
                'merchant' => $this->merchant,
                'trackId'  => $trackId,
            ];

            $response = $this->postToZibal('verify', $params);

            if ($response->result == 100) {
                return view('payment.success', [
                    'refNumber' => $response->refNumber,
                    'orderId'   => $response->orderId,
                    'trackId'   => $trackId,
                ]);
            } else {
                return view('payment.failed', [
                    'error' => $response->result . ' - ' . ($response->message ?? ''),
                ]);
            }
        } else {
            return view('payment.failed', ['error' => 'پرداخت توسط کاربر لغو شد.']);
        }
    }

    private function postToZibal($path, $params)
    {
        $url = 'https://gateway.zibal.ir/v1/' . $path;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response);
    }
}
