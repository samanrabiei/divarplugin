<?php

namespace App\Services\Strategies;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Services\Contracts\ServiceStrategyInterface;
use App\Services\TransactionService;
//send data in divar message
use App\Services\DivarMessageService;
use App\Helpers\TextHelper;
use Hekmatinasser\Verta\Verta;
use App\Models\ApiRequest;

class VehicleViolation implements ServiceStrategyInterface
{
    public function handle($service)
    {
        //submit transction
        $id =  Auth::id();
        $user = User::find($id);
        $transaction = app(TransactionService::class)->log(
            $user['id'],
            $user['token'],
            env('Maie_divarcehicleviloation_price'),
            $service['price'],
            $service['type'],
            0
        );

        //end code test
        // dd($service);
        preg_match('/^([^\d]+)(\d{2})([^\d]+)(\d{3})(\d{2})$/u', $service['palak'], $matches);
        $formatted = $matches[3] . ' ' . $matches[5] . ' – ' . $matches[4] . ' ' . $matches[1] . ' ' . $matches[2];
        //save to database
        $apiRequest = ApiRequest::create([
            'user_id' => $user['id'],
            'endpoint' =>  $service['serviceId'],
            'payload' => [
                'codemele' =>  $service['codemele'],
                'mobile' => $service['phone'],
                'plateNumber' => $formatted,
            ],
            'status' => 'paid',
        ]);
        //send data to api.ir
        // $url = "https://s.api.ir/api/sw1/VehicleViolation";
        // $response = Http::withHeaders([
        //     'Content-Type'  => 'application/json',
        //     'Authorization' => env('APIIR_KEY'),
        // ])->post($url, [
        //     "nationalCode" => $apiRequest->payload['codemele'],
        //     "mobile"       => $apiRequest->payload['mobile'],
        //     "plateNumber"    => $apiRequest->payload['plateNumber'],
        // ]);
        // $response = $response->json();





        //code test
        $data = [
            "data" => [
                "violations" => [
                    [
                        "id" => "d8d881162e874a6190c19109836f5f99",
                        "type" => "توقف وسايل نقليه در پياده‌رو",
                        "description" => "الصاقی",
                        "code" => "2107",
                        "price" => 800000,
                        "city" => null,
                        "location" => "سقز خ آزادي",
                        "serial" => "046195081088",
                        "dataValue" => "",
                        "barcode" => "",
                        "license" => null,
                        "billId" => "9508108800298",
                        "paymentId" => "80027468",
                        "date" => "1404/09/28-11:20:00",
                        "dateEn" => "2025-12-19T11:20:00",
                        "isPayable" => null,
                        "policemanCode" => null,
                        "hasImage" => false
                    ]
                ],
                "totalAmount" => 800000,
                "count" => 1
            ],
            "success" => true,
            "code" => 1,
            "error" => null,
            "message" => null
        ];
        $datatest = response()->json($data);
        $response = $datatest->getData(true);
        // dd($service);





        ApiRequest::where('endpoint',  $service['serviceId'])
            ->update([

                'status' => 'sent',
                'response' =>  $response,
            ]);

        if (isset($response['success']) && $response['success'] === true) {
            //update of database


            $messages = $response['data'];
            preg_match('/^([^\d]+)(\d{2})([^\d]+)(\d{3})(\d{2})$/u', $service['palak'], $palakmashin);

            //send data to divar
            if ($messages['totalAmount'] != 0) {
                $vazit = 'پرداخت نشده';
                $message_text = TextHelper::get_text('nopaymentkalafe');
            } else {
                $vazit = 'پرداخت شده';
                $message_text = TextHelper::get_text('paymentedkalafe');
            }

            $message = TextHelper::replace($message_text, [
                'palak' => $palakmashin['5'] . 'ایران-' . $palakmashin['4'] . $palakmashin['1']  . $palakmashin['2'],
                'vazit' =>  $vazit,
                'price' => number_format($messages['totalAmount']),
                'date_time' => (new Verta())->format('H:i:s d-m-Y ')
            ]);
            //start
            $service_message = new DivarMessageService();
            $answer =  $service_message->sendDivarMessage($message);

            //End
        } else {
            if ($response['success'] == false) {
                $id =  Auth::id();
                $user = User::find($id);
                $user->deposit($service['price']);

                session()->flash('error', [
                    'title' => 'انجام نشد',
                    'message' => 'متاسفانه درخواست سرویس با خطا مواجه شد،مبلغ به کیف پول شما برگشت داده شد، لطفا مجدد امتحان نمایید یا با پشتیبانی تماس حاصل نمایید.'
                ]);
                return redirect()->route('profile.profile');
            }
        }

        return view('divar.services_answer.VehicleViolation', ['messages' => $messages, 'service' => $service, 'date_time' => (new Verta())->format('H:i:s Y-m-d ')]);
    }
}
