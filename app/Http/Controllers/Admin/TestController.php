<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Services\TransactionService;
use Bavix\Wallet\Models\Transaction;

class TestController extends Controller
{
    public function index()
    {

        $transaction = app(TransactionService::class)->log(
            1,
            5000,
            200000,
            'ABC123',
            1
        );
        if ($transaction == true) {
            echo 'تراکنش با موفقیت ثبت شد';
        }
    }
}
