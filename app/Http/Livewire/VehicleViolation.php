<?php

namespace App\Http\Livewire;

use Livewire\Component;

class VehicleViolation extends Component
{
    public $phone;
    public $codemele;
    public $palak_part_1;
    public $palak_letter;
    public $palak_part2;
    public $palak_irancode;

    public $price = 30000;

    protected $rules = [
        'phone' => 'required|regex:/^09\d{9}$/',
        'codemele' => 'required|digits:10',
        'palak_part_1'   => 'required|digits:2',
        'palak_letter' => 'required|regex:/^[آ-یA-Za-z]$/u',
        'palak_part2'    => 'required|digits:3',
        'palak_irancode' => 'required|digits:2',
    ];

    protected $messages = [
        'phone.required' => 'شماره موبایل الزامی است.',
        'phone.regex' => 'فرمت شماره موبایل معتبر نیست.',
        'codemele.required' => 'کد ملی الزامی است.',
        'codemele.digits' => 'کد ملی باید ۱۰ رقم باشد.',
        'palak_part_1.required' => 'دو رقم اول پلاک الزامی است.',
        'palak_part_1.digits'   => 'دو رقم اول پلاک باید دقیقاً ۲ رقم باشد.',

        'palak_letter.required' => 'حرف وسط پلاک الزامی است.',
        'palak_letter.regex'    => 'حرف وسط پلاک باید فقط یک حرف باشد.',

        'palak_part2.required' => 'سه رقم وسط پلاک الزامی است.',
        'palak_part2.digits'   => 'سه رقم وسط پلاک باید دقیقاً ۳ رقم باشد.',

        'palak_irancode.required' => 'کد ایران پلاک الزامی است.',
        'palak_irancode.digits'   => 'کد ایران پلاک باید دقیقاً ۲ رقم باشد.',
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
                'palak' => $this->palak_letter . $this->palak_part_1 . 'ایران' . $this->palak_part2 . $this->palak_irancode,
                'price' => $this->price,
                'serviceId' => $serviceId,
                'type' => 'VehicleViolation'
            ],
        ]);
        // انتقال به صفحه پرداخت
        return redirect()->route('checkout.showForm', ['serviceId' => $serviceId]);
    }

    public function render()
    {
        return view('livewire.vehicle-violation');
    }
}
