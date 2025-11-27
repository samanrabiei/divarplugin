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

    // $transaction = app(TransactionService::class)->log(
    //     1,
    //     5000,
    //     200000,
    //     'ABC123',
    //     1
    // );
    // if ($transaction == true) {
    //     echo 'تراکنش با موفقیت ثبت شد';
    // }
    $response = [
      "data" => [
        "plate" => "111ب22ایران22",
        "priceStatus" => "پرداخت نشده",
        "paperId" => "123456",
        "paymentId" => "654321",
        "warningPrice" => "500000",
        "inquirePrice" => "500000",
        "ejrInquireNo" => "987654"
      ],
      "success" => true,
      "code" => 1,
      "error" => null,
      "message" => null
    ];
    $json = response()->json($response);
    $data = $json->getData(true);
    dd($data);
    $plate = $data->data->plate;
    echo $plate;
    // return view('divar.services_answer.VehicleViolation');
  }
}
