<?php

namespace App\Services\Strategies;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Services\Contracts\ServiceStrategyInterface;

class Shahkar implements ServiceStrategyInterface
{
    public function handle($service)
    {
        // $url = "https://s.api.ir/api/sw1/Shahkar";

        // $response = Http::withHeaders([
        //     'Content-Type'  => 'application/json',
        //     'Authorization' => env('APIIR_KEY'),
        // ])->post($url, [
        //     "nationalCode" => $service['codemele'],
        //     "mobile"       => $service['phone'],
        //     "isCompany"    => false
        // ]);

        $data = $response->json();


        $code = $data['code'];

        //برگشت پول به کیف پول اگر با خطا مواجه شد
        if ($data['success'] == false) {
            $id =  Auth::id();
            $user = User::find($id);
            $user->deposit($service['price']);

            session()->flash('error', [
                'title' => 'انجام نشد',
                'message' => 'متاسفانه درخواست سرویس با خطا مواجه شد، مبلغ به کیف پول شما برگشت داده شد.'
            ]);
            return redirect()->route('profile.profile');
        }

        if ($code === 0) {
            $messages = [
                "header" => "فرآیند اعتبارسنجی با موفقیت انجام شد.",
                "badge" => "تطابق دارد",
                "badge-class" => "badge badge-success",
                "message" => "کد ملی و شماره تلفن همراه متعلق به یک شخص بوده و تطابق آن‌ها تأیید شد."
            ];
        } else {
            $messages = [
                "header" => "فرآیند اعتبارسنجی با موفقیت انجام شد.",
                "badge" => "تطابق ندارد",
                "badge-class" => "badge badge-danger",
                "message" => 'این کد ملی و شماره موبایل متعلق به یک شخص نیست.'
            ];
        }

        return view('divar.services_answer.shahkar', ['messages' => $messages, 'service' => $service]);
    }
}
