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

class VehicleViolation implements ServiceStrategyInterface
{
    public function handle($service)
    {
        // dd($palak_section_1, $palak_section_2);
        preg_match('/^([^\d]+)(\d{2})([^\d]+)(\d{3})(\d{2})$/u', $service['palak'], $matches);
        $palak_section_1 = $matches[2] . ' ' . $matches[4] . ' ' . $matches[1];
        $palak_section_2 = $matches[5];

        $url = "https://service.zohal.io/api/v0/services/inquiry/vehicle_inquiry/total_violations";

        $response = Http::withHeaders([
            'Content-Type'  => 'application/json',
            'Authorization' => env('ZIBALL'),
        ])->post($url, [
            "mobile"       => $service['phone'],
            "national_code" => $service['codemele'],
            "plate_number" => $palak_section_1,
            "region_code" =>  $palak_section_2
        ]);

        $response = $response->json();

        //code test

        // $datea = [
        //     "response_body" => [
        //         "data" => [
        //             "ejr_inquire_no" => "9XXXXXXXX0",
        //             "inquire_price" => "10000000",
        //             "page_count" => 0,
        //             "paper_id" => "1XXXXXXXXX196",
        //             "payment_id" => "6XXXXXXX15",
        //             "plate" => " شخصي  ايران۱۱  ــ  ۱۱۱ب۱۱",
        //             "price_status" => "1",
        //             "warning_price" => "10000000"
        //         ],
        //         "error_code" => null,
        //         "message" => "موفق"
        //     ],
        //     "result" => 1
        // ];
        // $datatest = response()->json($datea);
        // $response = $datatest->getData(true);
        // dd($service);



        //submit transction
        // $id =  Auth::id();
        // $user = User::find($id);
        // $transaction = app(TransactionService::class)->log(
        //     $user['id'],
        //     env('Maie_divarcehicleviloation_price'),
        //     $service['price'],
        //     $service['type'],
        //     0
        // );

        //end code test
        // dd($response);
        // $code = $data['code'];


        if (isset($response['result']) && $response['result'] == 1) {
            $messages = $response;

            //send data to divar

            if ($messages['response_body']['data']['inquire_price'] != 0) {
                $message_text = '
        🚗 نتیجه استعلام خلافی خودرو

           🔹 پلاک خودرو: {palak}

         📄 وضعیت خلافی‌ها:
         • وضعیت پرداخت: پرداخت نشده
         • شناسه قبض: {shnasegabz}
         • شناسه پرداخت: {shnasepardagt}

         • مبلغ کل جریمه‌ها:  {price} ریال
          • شماره پیگیری استعلام: {shomarepegere}
   
            📝 توضیح:
           برای پرداخت جریمه‌ها می‌توانید از برنامه ها معتبر بانکی، کارت خوان، دستگاه ATM و همه مواردی که قابلیت پرداخت قبض با شناسه قبض و پرداخت را دارند را استفاده کنید.
        ';
            } else {
                $message_text = '
        🚗 نتیجه استعلام خلافی خودرو

    🔹 پلاک خودرو: {palak}

    📄 وضعیت خلافی‌ها:
 ✅ وضعیت پرداخت:  پرداخت شده
 شماره پیگیری استعلام: {shomarepegere}
   
    📝 توضیح:
تمامی خلافی های این پلاک پرداخت شده و در حال حاضر خلافی آن صفر می باشد.
        ';
            }

            $message = TextHelper::replace($message_text, [
                'palak' => $matches['5'] . 'ایران-' . $matches['4'] . $matches['1']  . $matches['2'],
                'shnasegabz' =>  $messages['response_body']['data']['paper_id'],
                'shnasepardagt' =>  $messages['response_body']['data']['payment_id'],
                'price' => number_format($messages['response_body']['data']['inquire_price']),
                'shomarepegere' => $messages['response_body']['data']['ejr_inquire_no'],
            ]);
            //start
            $service_message = new DivarMessageService();
            $answer =  $service_message->sendDivarMessage($message);

            //End
        } else {
            if ($response['result'] != 1) {
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

        return view('divar.services_answer.VehicleViolationZiball', ['messages' => $messages, 'service' => $service]);
    }
}
