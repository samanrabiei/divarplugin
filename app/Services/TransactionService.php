<?php

namespace App\Services;

use App\Models\Admin\DivarTransaction;

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
                return true; // موفقیت
            } else {
                return false; // ناموفق
            }
        } catch (\Exception $e) {
            return false; // اگر خطایی رخ دهد
        }
    }
}
