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
            preg_match('/^([^\d]+)(\d{2})([^\d]+)(\d{3})(\d{2})$/u', $record->payload['plateNumber'], $matches);
            ?>

            <div class="fine-card">
                <h3>نتیجه استعلام خلافی</h3>

                <div class="item">
                    <strong>
                        <div class="plate-section border-section">
                            {{ $record->payload['plateNumber'] }}
                            {{-- <!-- پرچم و I.R IRAN -->
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
                                <input type="text" class="form-control plate-input" maxlength="3" placeholder="- - -"
                                    value="{{ $matches[4] }}" name="palak_part2" wire:model="palak_part2" id="palak_part2"
                                    disabled>


                            </div>

                            <span>-</span>

                            <!-- ایران + دو رقم آخر -->
                            <div class="palak_irancode d-flex flex-column">
                                <div style="font-size: 12px; font-weight: bold;direction: rtl;">ایران</div>

                                <input type="text" class="form-control plate-input" maxlength="2" placeholder="- -"
                                    value="{{ $matches[5] }}" name="palak_irancode" wire:model="palak_irancode"
                                    id="palak_irancode" disabled>


                            </div> --}}

                        </div>
                    </strong>
                </div>
            </div>
            @foreach ($record->response['data']['violations'] as $violation)
                <div class="fine-card">
                    @isset($violation['type'])
                        <div class="item">
                            <strong>
                                {{ $violation['type'] ?? '' }}
                                </br>

                                {{ $violation['description'] ?? '' }}
                            </strong>
                        </div>
                    @endisset
                    @isset($violation['price'])
                        <div class="item">
                            <span>محل تخلف :</span>
                            <strong>{{ $violation['location'] }}
                            </strong>
                        </div>
                    @endisset
                    @isset($violation['date'])
                        <div class="item">
                            <span> تاریخ و ساعت:</span>
                            <strong> {{ $violation['date'] ?? '' }}</strong>
                        </div>
                    @endisset
                    @isset($violation['price'])
                        <div class="item">
                            <span>مبلغ :</span>
                            <strong class="price">{{ number_format($violation['price']) }}
                                ریال</strong>
                        </div>
                    @endisset



                    @isset($violation['billId'])
                        <div class="item">
                            <span>شناسه قبض:</span>
                            <div class="copy-box">
                                <strong id="paperId">{{ $violation['billId'] ?? '' }}</strong>
                                <button onclick="copyText(event, 'paperId')" class="copy-btn">کپی</button>
                            </div>
                        </div>
                    @endisset
                    @isset($violation['paymentId'])
                        <div class="item">
                            <span>شناسه پرداخت:</span>
                            <div class="copy-box">
                                <strong id="paymentId">{{ $violation['paymentId'] ?? '' }}</strong>
                                <button onclick="copyText(event, 'paymentId')" class="copy-btn">کپی</button>
                            </div>
                        </div>
                    @endisset

                    @isset($violation['id'])
                        <div class="item">
                            <span> شناسه :</span>
                            <strong>{{ $violation['id'] ?? '' }}</strong>
                        </div>
                    @endisset

                </div>
            @endforeach





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
