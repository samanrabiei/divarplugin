@extends('webapp_layout.master')
@section('content')
    <div class="page-content">

        <div class="account-box">
            <div class="container">
                <div class="logo-area">
                    <img class="logo-dark" src="assets/images/logo.png" alt="">
                    <img class="logo-light" src="assets/images/logo-white.png" alt="">
                </div>
                <div class="section-head ps-0">
                    <h2>خوش آمدید!</h2>
                    <p>برای ورود یا ثبت نام شماره موبایل خود را وارد نمایید.</p>
                </div>
                <div class="account-area">
                    <form method="POST" action="{{ route('otp.send') }}">
                        @csrf
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

                        <button class="btn mb-3 btn-primary w-100" type="submit">ورود / ثبت نام</button>
                        <p class="btn-link text-center mb-3 text-dark">با حساب دیوار خود وارد
                            نمایید؟</p>
                        <a href="{{ route('kenar.login') }}" class="btn mb-3 btn-outline-primary w-100">ورود با دیوار</a>
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
