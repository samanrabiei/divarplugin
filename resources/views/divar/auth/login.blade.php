@extends('webapp_layout.master')
@section('content')
    <div class="page-content">

        <div class="account-box">
            <div class="container">
                <div class="logo-area text-center">
                    <img class="logo-dark" src="https://hubabzar.ir/assets/img/logo/logo-abzar.png" alt="">
                    <img class="logo-light" src="https://hubabzar.ir/assets/img/logo/logo-abzar.png" alt="">
                </div>
                <div class="section-head ps-0 text-center">
                    <h2>خوش آمدید!</h2>
                    {{-- <p>برای ورود یا ثبت نام شماره موبایل خود را وارد نمایید.</p> --}}
                </div>
                @if (session('status'))
                    <div class="alert alert-danger solid alert-dismissible fade show">
                        <svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2"
                            fill="none" stroke-linecap="round" stroke-linejoin="round" class="ms-2">
                            <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                            </polygon>
                            <line x1="15" y1="9" x2="9" y2="15"></line>
                            <line x1="9" y1="9" x2="15" y2="15"></line>
                        </svg>
                        <strong>خطا!</strong><span class="text-lowercase"></span>
                        کد به شماره موبایل
                        {{ session('status') }}
                        ارسال نشد، لطفا کمی صبرکنید و مجددا امتحان نمایید.

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i
                                    class="icon feather icon-x"></i></span>
                        </button>
                    </div>
                @endif
                <div class="account-area">
                    <form method="POST" action="{{ route('otp.send') }}">
                        {{-- @csrf
                        <div class="mb-3">
                            <label class="form-label" for="name">شماره موبایل</label>
                            <input type="number" wire:model="phone" id="phone" class="form-control" name="phone"
                                value="{{ old('phone') }}">
                            @error('phone')
                                <strong class="text-primary">{{ $message }}</strong>
                            @enderror

                        </div>
                        @error('gavanin')
                            <strong class="text-primary">{{ $message }}</strong>
                        @enderror
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" name="gavanin" id="Checked-1" checked>

                            <label class="form-check-label" for="Checked-1"> با تمام قوانین و مقررارت موافقم.

                            </label>

                        </div>

                        <button class="btn mb-3 btn-primary w-100" type="submit">ورود / ثبت نام</button> --}}
                        <p class="btn-link text-center mb-3 text-dark">با حساب دیوار خود وارد یا ثبت نام نمایید
                        </p>
                        <a href="{{ route('kenar.login') }}" class="btn mb-3 btn-outline-primary w-100">ورود با
                            دیوار</a>
                        <div id="timerBox" class="text-center mt-3" style="display:none;">
                            <span>ارسال مجدد کد تا </span>
                            <span id="countdown" class="text-primary fw-bold">120</span>
                            <span> ثانیه دیگر</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sendBtn = document.querySelector('form button[type="submit"]');
        const timerBox = document.getElementById('timerBox');
        const countdownEl = document.getElementById('countdown');

        // فقط زمانی تایمر نمایش داده می‌شود که otp_sent_at از بک‌اند آمده باشد
        @if (Session::has('otp_sent_at'))
            const remaining = {{ max(0, 120 - \Carbon\Carbon::now()->diffInSeconds(session('otp_sent_at'))) }};
            if (remaining > 0) {
                startCountdown(remaining);
            }
        @endif

        function startCountdown(seconds) {
            sendBtn.disabled = true;
            timerBox.style.display = 'block';

            let remaining = seconds;
            countdownEl.textContent = remaining;

            const interval = setInterval(() => {
                remaining--;
                countdownEl.textContent = remaining;

                if (remaining <= 0) {
                    clearInterval(interval);
                    sendBtn.disabled = false;
                    timerBox.style.display = 'none';
                }
            }, 1000);
        }
    });
</script>
