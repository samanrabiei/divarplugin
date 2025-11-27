<?php

namespace App\Services\Strategies;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Services\Contracts\ServiceStrategyInterface;

class VehicleViolation implements ServiceStrategyInterface
{
    public function handle($service)
    {
        // dd($service);
        // $url = "https://s.api.ir/api/sw1/VehicleViolation";

        // $response = Http::withHeaders([
        //     'Content-Type'  => 'application/json',
        //     'Authorization' => env('APIIR_KEY'),
        // ])->post($url, [
        //     "nationalCode" => $service['codemele'],
        //     "mobile"       => $service['phone'],
        //     "plate"    => $service['palak']
        // ]);

        // $response = $response->json();

        //code test
        $datea = [
            "data" => [
                "plate" => "111ب22ایران22",
                "priceStatus" => "پرداخت نشده",
                "paperId" => "123456",
                "paymentId" => "654321",
                "warningPrice" => "0",
                "inquirePrice" => "0",
                "ejrInquireNo" => "987654"
            ],
            "success" => true,
            "code" => 1,
            "error" => null,
            "message" => null
        ];
        $datatest = response()->json($datea);
        $response = $datatest->getData(true);

        //end code test
        // dd($response);
        // $code = $data['code'];


        if (isset($response['success']) && $response['success'] === true) {
            $messages = $response['data'];
        } else {
            if ($response['success'] == false) {
                // $id =  Auth::id();
                // $user = User::find($id);
                // $user->deposit($service['price']);

                session()->flash('error', [
                    'title' => 'انجام نشد',
                    'message' => 'متاسفانه درخواست سرویس با خطا مواجه شد، لطفا با پشتیبانی تماس بگیرید.'
                ]);
                return redirect()->route('profile.profile');
            }
        }

        return view('divar.services_answer.VehicleViolation', ['messages' => $messages, 'service' => $service]);
    }
}
