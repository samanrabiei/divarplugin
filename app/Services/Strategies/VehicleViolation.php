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
        // dd($service);
        $url = "https://s.api.ir/api/sw1/VehicleViolation";

        $response = Http::withHeaders([
            'Content-Type'  => 'application/json',
            'Authorization' => env('APIIR_KEY'),
        ])->post($url, [
            "nationalCode" => $service['codemele'],
            "mobile"       => $service['phone'],
            "plate"    => $service['palak']
        ]);

        $response = $response->json();

        //code test

        // $datea = [
        //     "data" => [
        //         "plate" => "111ب22ایران22",
        //         "priceStatus" => "پرداخت نشده",
        //         "paperId" => "123456",
        //         "paymentId" => "654321",
        //         "warningPrice" => "0",
        //         "inquirePrice" => "0",
        //         "ejrInquireNo" => "987654"
        //     ],
        //     "success" => true,
        //     "code" => 1,
        //     "error" => null,
        //     "message" => null
        // ];
        // $datatest = response()->json($datea);
        // $response = $datatest->getData(true);
        // dd($service);
        //submit transction
        $id =  Auth::id();
        $user = User::find($id);
        $transaction = app(TransactionService::class)->log(
            $user['id'],
            env('Maie_divarcehicleviloation_price'),
            $service['price'],
            $service['type'],
            0
        );

        //end code test
        // dd($response);
        // $code = $data['code'];


        if (isset($response['success']) && $response['success'] === true) {
            $messages = $response['data'];

            preg_match('/^([^\d]+)(\d{2})([^\d]+)(\d{3})(\d{2})$/u', $service['palak'], $matches);
            //send data to divar

            if ($messages['inquirePrice'] != 0) {
                $message_text = '
        🚗 نتیجه استعلام خلافی خودرو

           🔹 پلاک خودرو: {palak}

         📄 وضعیت خلافی‌ها:
         • وضعیت پرداخت:  {vazit}
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
 ✅ وضعیت پرداخت:  {vazit}
 شماره پیگیری استعلام: {shomarepegere}
   
    📝 توضیح:
تمامی خلافی های این پلاک پرداخت شده و در حال حاضر خلافی آن صفر می باشد.
        ';
            }

            $message = TextHelper::replace($message_text, [
                'palak' => $matches['5'] . 'ایران-' . $matches['4'] . $matches['1']  . $matches['2'],
                'vazit' => $messages['priceStatus'],
                'shnasegabz' =>  $messages['paperId'],
                'shnasepardagt' =>  $messages['paymentId'],
                'price' => number_format($messages['inquirePrice']),
                'shomarepegere' => $messages['ejrInquireNo'],
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

        return view('divar.services_answer.VehicleViolation', ['messages' => $messages, 'service' => $service]);
    }
}
