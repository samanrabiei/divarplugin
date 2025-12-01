<?php

namespace App\Services;

use App\Models\Admin\DivarTransaction;
use Illuminate\Support\Facades\Http;

class TransactionService
{
    public function log($user_id, $profit, $amount, $service_shnase, $sended)
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
                    'Authorization' => 'Bearer ' . 'ory_at_uS2AeA7IfNsCO9qqjUDDh640BK50fle1konCbXZZ_rU.gD7tlzbNF41HjVttv7ad4AhQ-XOeBvkVuy3tT4dFWg8',
                ])->post('https://open-api.divar.ir/v1/open-platform/user-payments', [
                    'amount_rials' => $amount,
                    'profit_rials' => $profit,
                    'reference_id' => $transaction->id,
                    'services' => [$service_shnase],
                ]);

                $data = $response->json();

                // اگر درخواست موفق بود، sended را 1 کن
                if (empty($data)) {
                    $transaction->update(['sended' => 1]);
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
