<?php

return [

    /*
    |--------------------------------------------------------------------------
    | خطوط پیام اعتبارسنجی
    |--------------------------------------------------------------------------
    |
    | خطوط زیر شامل پیام‌های پیش‌فرض خطا هستند که توسط کلاس اعتبارسنجی
    | استفاده می‌شوند. برخی از قوانین چند نسخه دارند مانند قوانین مربوط
    | به اندازه. می‌توانید این پیام‌ها را به دلخواه ویرایش کنید.
    |
    */

    'accepted' => ':attribute باید پذیرفته شود.',
    'accepted_if' => ':attribute باید زمانی که :other برابر :value است پذیرفته شود.',
    'active_url' => ':attribute یک آدرس URL معتبر نیست.',
    'after' => ':attribute باید تاریخی بعد از :date باشد.',
    'after_or_equal' => ':attribute باید تاریخی بعد از یا مساوی با :date باشد.',
    'alpha' => ':attribute باید فقط شامل حروف باشد.',
    'alpha_dash' => ':attribute باید فقط شامل حروف، اعداد، خط تیره و زیرخط (_) باشد.',
    'alpha_num' => ':attribute باید فقط شامل حروف و اعداد باشد.',
    'array' => ':attribute باید یک آرایه باشد.',
    'ascii' => ':attribute باید فقط شامل کاراکترها و نمادهای تک‌بایتی باشد.',
    'before' => ':attribute باید تاریخی قبل از :date باشد.',
    'before_or_equal' => ':attribute باید تاریخی قبل از یا مساوی با :date باشد.',
    'between' => [
        'array' => ':attribute باید بین :min تا :max مورد داشته باشد.',
        'file' => ':attribute باید بین :min تا :max کیلوبایت باشد.',
        'numeric' => ':attribute باید بین :min تا :max باشد.',
        'string' => ':attribute باید بین :min تا :max کاراکتر باشد.',
    ],
    'boolean' => 'فیلد :attribute باید مقدار درست یا نادرست داشته باشد.',
    'confirmed' => 'تأییدیه‌ی :attribute با مقدار آن مطابقت ندارد.',
    'current_password' => 'رمز عبور نادرست است.',
    'date' => ':attribute تاریخ معتبر نیست.',
    'date_equals' => ':attribute باید تاریخی برابر با :date باشد.',
    'date_format' => ':attribute با فرمت :format مطابقت ندارد.',
    'decimal' => ':attribute باید دارای :decimal رقم اعشار باشد.',
    'declined' => ':attribute باید رد شود.',
    'declined_if' => ':attribute باید رد شود وقتی :other برابر با :value است.',
    'different' => ':attribute و :other باید متفاوت باشند.',
    'digits' => ':attribute باید :digits رقم باشد.',
    'digits_between' => ':attribute باید بین :min تا :max رقم باشد.',
    'dimensions' => 'ابعاد تصویر :attribute نامعتبر است.',
    'distinct' => 'فیلد :attribute دارای مقدار تکراری است.',
    'doesnt_end_with' => ':attribute نباید با یکی از موارد زیر تمام شود: :values.',
    'doesnt_start_with' => ':attribute نباید با یکی از موارد زیر شروع شود: :values.',
    'email' => ':attribute باید یک ایمیل معتبر باشد.',
    'ends_with' => ':attribute باید با یکی از موارد زیر تمام شود: :values.',
    'enum' => 'مقدار انتخاب‌شده برای :attribute نامعتبر است.',
    'exists' => 'مقدار انتخاب‌شده برای :attribute نامعتبر است.',
    'file' => ':attribute باید یک فایل باشد.',
    'filled' => 'فیلد :attribute باید مقدار داشته باشد.',
    'gt' => [
        'array' => ':attribute باید بیش از :value مورد داشته باشد.',
        'file' => ':attribute باید بزرگ‌تر از :value کیلوبایت باشد.',
        'numeric' => ':attribute باید بزرگ‌تر از :value باشد.',
        'string' => ':attribute باید بیش از :value کاراکتر داشته باشد.',
    ],
    'gte' => [
        'array' => ':attribute باید حداقل :value مورد داشته باشد.',
        'file' => ':attribute باید بزرگ‌تر یا مساوی :value کیلوبایت باشد.',
        'numeric' => ':attribute باید بزرگ‌تر یا مساوی :value باشد.',
        'string' => ':attribute باید حداقل :value کاراکتر داشته باشد.',
    ],
    'image' => ':attribute باید یک تصویر باشد.',
    'in' => 'مقدار انتخاب‌شده برای :attribute نامعتبر است.',
    'in_array' => 'فیلد :attribute در :other وجود ندارد.',
    'integer' => ':attribute باید عدد صحیح باشد.',
    'ip' => ':attribute باید یک آدرس IP معتبر باشد.',
    'ipv4' => ':attribute باید یک آدرس IPv4 معتبر باشد.',
    'ipv6' => ':attribute باید یک آدرس IPv6 معتبر باشد.',
    'json' => ':attribute باید رشته JSON معتبر باشد.',
    'lowercase' => ':attribute باید حروف کوچک باشد.',
    'lt' => [
        'array' => ':attribute باید کمتر از :value مورد داشته باشد.',
        'file' => ':attribute باید کمتر از :value کیلوبایت باشد.',
        'numeric' => ':attribute باید کمتر از :value باشد.',
        'string' => ':attribute باید کمتر از :value کاراکتر داشته باشد.',
    ],
    'lte' => [
        'array' => ':attribute نباید بیش از :value مورد داشته باشد.',
        'file' => ':attribute باید کمتر یا مساوی :value کیلوبایت باشد.',
        'numeric' => ':attribute باید کمتر یا مساوی :value باشد.',
        'string' => ':attribute باید حداکثر :value کاراکتر داشته باشد.',
    ],
    'mac_address' => ':attribute باید یک آدرس MAC معتبر باشد.',
    'max' => [
        'array' => ':attribute نباید بیش از :max مورد داشته باشد.',
        'file' => ':attribute نباید بیش از :max کیلوبایت باشد.',
        'numeric' => ':attribute نباید بزرگ‌تر از :max باشد.',
        'string' => ':attribute نباید بیش از :max کاراکتر داشته باشد.',
    ],
    'max_digits' => ':attribute نباید بیش از :max رقم داشته باشد.',
    'mimes' => ':attribute باید فایلی از نوع: :values باشد.',
    'mimetypes' => ':attribute باید فایلی از نوع: :values باشد.',
    'min' => [
        'array' => ':attribute باید حداقل :min مورد داشته باشد.',
        'file' => ':attribute باید حداقل :min کیلوبایت باشد.',
        'numeric' => ':attribute باید حداقل :min باشد.',
        'string' => ':attribute باید حداقل :min کاراکتر داشته باشد.',
    ],
    'min_digits' => ':attribute باید حداقل :min رقم داشته باشد.',
    'missing' => 'فیلد :attribute باید خالی باشد.',
    'missing_if' => 'فیلد :attribute باید زمانی که :other برابر :value است خالی باشد.',
    'missing_unless' => 'فیلد :attribute باید خالی باشد مگر اینکه :other برابر با :value باشد.',
    'missing_with' => 'فیلد :attribute باید زمانی که :values وجود دارد خالی باشد.',
    'missing_with_all' => 'فیلد :attribute باید زمانی که :values وجود دارند خالی باشد.',
    'multiple_of' => ':attribute باید مضربی از :value باشد.',
    'not_in' => 'مقدار انتخاب‌شده برای :attribute نامعتبر است.',
    'not_regex' => 'فرمت :attribute نامعتبر است.',
    'numeric' => ':attribute باید عدد باشد.',
    'password' => [
        'letters' => ':attribute باید حداقل شامل یک حرف باشد.',
        'mixed' => ':attribute باید شامل حداقل یک حرف بزرگ و یک حرف کوچک باشد.',
        'numbers' => ':attribute باید حداقل شامل یک عدد باشد.',
        'symbols' => ':attribute باید حداقل شامل یک نماد باشد.',
        'uncompromised' => ':attribute در داده‌های لو رفته مشاهده شده است. لطفاً مقدار دیگری انتخاب کنید.',
    ],
    'present' => 'فیلد :attribute باید وجود داشته باشد.',
    'prohibited' => 'فیلد :attribute مجاز نیست.',
    'prohibited_if' => 'فیلد :attribute زمانی که :other برابر :value است مجاز نیست.',
    'prohibited_unless' => 'فیلد :attribute مجاز نیست مگر اینکه :other در :values باشد.',
    'prohibits' => 'وجود فیلد :attribute باعث ممنوعیت فیلد :other می‌شود.',
    'regex' => 'فرمت :attribute نامعتبر است.',
    'required' => 'فیلد :attribute الزامی است.',
    'required_array_keys' => 'فیلد :attribute باید شامل مقادیر زیر باشد: :values.',
    'required_if' => 'فیلد :attribute زمانی که :other برابر :value است الزامی است.',
    'required_if_accepted' => 'فیلد :attribute زمانی که :other پذیرفته شده الزامی است.',
    'required_unless' => 'فیلد :attribute الزامی است مگر اینکه :other در :values باشد.',
    'required_with' => 'فیلد :attribute زمانی که :values وجود دارد الزامی است.',
    'required_with_all' => 'فیلد :attribute زمانی که :values وجود دارند الزامی است.',
    'required_without' => 'فیلد :attribute زمانی که :values وجود ندارد الزامی است.',
    'required_without_all' => 'فیلد :attribute زمانی که هیچ‌کدام از :values وجود ندارند الزامی است.',
    'same' => ':attribute و :other باید یکسان باشند.',
    'size' => [
        'array' => ':attribute باید شامل :size مورد باشد.',
        'file' => ':attribute باید :size کیلوبایت باشد.',
        'numeric' => ':attribute باید برابر :size باشد.',
        'string' => ':attribute باید :size کاراکتر داشته باشد.',
    ],
    'starts_with' => ':attribute باید با یکی از موارد زیر شروع شود: :values.',
    'string' => ':attribute باید رشته‌ای از حروف باشد.',
    'timezone' => ':attribute باید منطقه زمانی معتبر باشد.',
    'unique' => ':attribute قبلاً استفاده شده است.',
    'uploaded' => 'آپلود :attribute با شکست مواجه شد.',
    'uppercase' => ':attribute باید حروف بزرگ باشد.',
    'url' => ':attribute باید یک آدرس URL معتبر باشد.',
    'ulid' => ':attribute باید ULID معتبر باشد.',
    'uuid' => ':attribute باید UUID معتبر باشد.',

    /*
    |--------------------------------------------------------------------------
    | پیام‌های سفارشی اعتبارسنجی
    |--------------------------------------------------------------------------
    |
    | می‌توانید پیام‌های سفارشی را برای هر فیلد و قانون خاص در این بخش
    | تعریف کنید.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'پیام-سفارشی',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | نام‌های سفارشی فیلدها
    |--------------------------------------------------------------------------
    |
    | در اینجا می‌توانید نام فیلدها را به صورت کاربرپسندتر جایگزین کنید.
    | مثلاً به‌جای "email" بنویسید "آدرس ایمیل".
    |
    */

    'attributes' => [
        'codemele' => 'کد ملی',
        'phone' => 'موبایل',
        'gavanin' => 'پذیرش قوانین',

    ],

];
