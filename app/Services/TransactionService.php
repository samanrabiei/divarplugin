<?php

namespace App\Services;

use App\Models\Admin\DivarTransaction;
use Illuminate\Support\Facades\Http;

class TransactionService
{
    public function log($user_id, $token, $profit, $amount, $service_shnase, $sended)
    {
        try {
            $transaction = DivarTransaction::create([
                'user_id'        => $user_id,
                'profit'         => $profit,
                'amount'         => $amount,
                'service_shnase' => $service_shnase,
                'sended'         => $sended,
            ]);

            if ($transaction) {
                // ارسال به Divar API
                $response = Http::withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'X-API-Key' => env('API_KEY'),
                    'Authorization' => 'Bearer ' . $token,
                ])->post('https://open-api.divar.ir/v1/open-platform/user-payments', [
                    'amount_rials' => $amount,
                    'profit_rials' => $profit,
                    'reference_id' => $transaction['transaction_id'],
                    'services' => [$service_shnase],
                ]);

                $data = $response->json();

                // اگر درخواست موفق بود، sended را 1 کن
                if (empty($data)) {
                    $update = DivarTransaction::where('transaction_id', $transaction['transaction_id'])->first();
                    $update->sended = 1; // یا هر مقداری که میخوای
                    $update->save();
                }

                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            return false;
        }
    }
}
