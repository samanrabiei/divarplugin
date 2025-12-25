<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ApiRequest;


class TestController extends Controller
{
  public function index()
  {
    $apiRequest = ApiRequest::create([
      'endpoint' => 'trx_23423fsdf3432',
      'payload' => [
        'codemele' => '3750224560',
        'mobile' => '09180078645',
        'plateNumber' => '09180078645',
      ],
      'status' => 'paid',
    ]);

    $data = ApiRequest::where('endpoint', 'trx_23423fsdf3432')
      ->update([
        'status' => 'sent',
        'response' => '{"codemele":"3750224560","mobile":"09180078645","plateNumber":"09180078645"}'
      ]);

    return $data;
  }
}
