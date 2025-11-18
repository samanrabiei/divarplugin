<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShahkarInquiry extends Component
{
    public $phone;
    public $codemele;
    public $price = 6000;

    protected $rules = [
        'phone' => 'required|regex:/^09\d{9}$/',
        'codemele' => 'required|digits:10',
    ];

    protected $messages = [
        'phone.required' => 'شماره موبایل الزامی است.',
        'phone.regex' => 'فرمت شماره موبایل معتبر نیست.',
        'codemele.required' => 'کد ملی الزامی است.',
        'codemele.digits' => 'کد ملی باید ۱۰ رقم باشد.',
    ];

    public function submit()
    {
        $this->validate();

        // ساخت شناسه‌ی منحصربه‌فرد برای تراکنش
        $serviceId = uniqid('txn_');

        // ذخیره اطلاعات در session
        session([
            "service.$serviceId" => [
                'phone' => $this->phone,
                'codemele' => $this->codemele,
                'price' => $this->price,
                'serviceId' => $serviceId,
                'type' => 'shahkar'
            ],
        ]);

        // انتقال به صفحه پرداخت
        return redirect()->route('checkout.showForm', ['serviceId' => $serviceId]);
    }


    public function render()
    {
        return view('livewire.shahkar-inquiry');
    }
}
