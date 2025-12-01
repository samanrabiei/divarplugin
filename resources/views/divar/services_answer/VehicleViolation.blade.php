@extends('webapp_layout.master')

@section('content')
    <x-page-assets css="{{ asset('assets/answer_service/style.css') }}" js="{{ asset('assets/answer_service/script.js') }}" />


    <header class="header header-fixed">
        <div class="container">
            <div class="header-content">
                <div class="left-content">
                    <a href="{{ env('Back_divar') }}" class="back-btn"><i class="icon feather icon-chevron-right"></i></a>
                </div>
                دیوار
                <div class="mid-content">
                    <h6 class="title">{{ __('app.Request result') }}</h6>
                </div>
                @auth
                    <div class="right-content">
                        <a href="{{ route('profile.profile') }}" class="">
                            <i class="icon feather icon-user"></i>
                            پروفایل
                        </a>
                    </div>
                @endauth
                @guest
                    <div class="right-content">
                        <a href="{{ route('profile.profile') }}" class="">
                            <i class="icon feather icon-user"></i>
                            ورود/ثبت نام
                        </a>
                    </div>
                @endguest
            </div>
        </div>
    </header>

    <div class="page-content space-top p-b80">
        <div class="container">

            <?php
            preg_match('/^([^\d]+)(\d{2})([^\d]+)(\d{3})(\d{2})$/u', $service['palak'], $matches);
            ?>
            @if ($messages)
                <div class="fine-card">
                    <h3>نتیجه استعلام خلافی</h3>

                    <div class="item">
                        <strong>
                            <div class="plate-section border-section">

                                <!-- پرچم و I.R IRAN -->
                                <div class="palak-parcham">
                                    <img src="{{ asset('assets/images/palak/flagiran.jpg') }}" alt="پرچم ایران"
                                        style="height: 25px;">
                                    <div style="font-weight: bold; margin-top: 5px;">I.R IRAN</div>
                                </div>

                                <!-- دو رقم اول -->
                                <div class="d-flex flex-column">
                                    <input type="text" name="palak_part_1" wire:model="palak_part_1"
                                        class="form-control plate-input" maxlength="2" placeholder="- -"
                                        value="{{ $matches[2] }} " id="palak_part_1" disabled>


                                </div>

                                <!-- حرف وسط -->
                                <div class="d-flex flex-column">
                                    <input type="text" class="form-control plate-letter" maxlength="1" placeholder="الف"
                                        value="{{ $matches[1] }}" name="palak_letter" wire:model="palak_letter"
                                        id="palak_letter" disabled>


                                </div>

                                <!-- سه رقم وسط -->
                                <div class="d-flex flex-column">
                                    <input type="text" class="form-control plate-input" maxlength="3"
                                        placeholder="- - -" value="{{ $matches[4] }}" name="palak_part2"
                                        wire:model="palak_part2" id="palak_part2" disabled>


                                </div>

                                <span>-</span>

                                <!-- ایران + دو رقم آخر -->
                                <div class="palak_irancode d-flex flex-column">
                                    <div style="font-size: 12px; font-weight: bold;direction: rtl;">ایران</div>

                                    <input type="text" class="form-control plate-input" maxlength="2" placeholder="- -"
                                        value="{{ $matches[5] }}" name="palak_irancode" wire:model="palak_irancode"
                                        id="palak_irancode" disabled>


                                </div>

                            </div>
                        </strong>
                    </div>
                    @if ($messages['inquirePrice'] != 0)
                        <div class="item">
                            <span>وضعیت پرداخت:</span>
                            <strong class="status unpaid"> {{ $messages['priceStatus'] }}</strong>
                        </div>

                        <div class="item">
                            <span>شناسه قبض:</span>
                            <div class="copy-box">
                                <strong id="paperId">{{ $messages['paperId'] }}</strong>
                                <button onclick="copyText(event, 'paperId')" class="copy-btn">کپی</button>
                            </div>
                        </div>

                        <div class="item">
                            <span>شناسه پرداخت:</span>
                            <div class="copy-box">
                                <strong id="paymentId">{{ $messages['paymentId'] }}</strong>
                                <button onclick="copyText(event, 'paymentId')" class="copy-btn">کپی</button>
                            </div>
                        </div>

                        <div class="item">
                            <span>مبلغ جریمه‌ها:</span>
                            <strong class="price">{{ number_format($messages['inquirePrice']) }} ریال</strong>
                        </div>
                    @else
                        <img src="{{ asset('assets/images/serviceanswer/kalafe.jpg') }}">

                        <div class="item">
                            <span> همه جریمه‌های این پلاک پرداخت شده است.</span>
                        </div>
                    @endif

                    <div class="item">
                        <span>شماره پیگیری استعلام:</span>
                        <strong>{{ $messages['ejrInquireNo'] }}</strong>
                    </div>
                </div>
            @else
            @endif
            <a href="{{ route('services.VehicleViolation') }}" class="btn btn-outline-primary btn-block mb-3">
                {{ __('app.this service requist return') }}
            </a>
            <script>
                function copyText(id) {
                    let text = document.getElementById(id).textContent;
                    navigator.clipboard.writeText(text).then(() => {
                        let btn = event.target;
                        btn.textContent = "کپی شد!";
                        setTimeout(() => {
                            btn.textContent = "کپی";
                        }, 1200);
                    });
                }
            </script>
        </div>
    </div>
@endsection
