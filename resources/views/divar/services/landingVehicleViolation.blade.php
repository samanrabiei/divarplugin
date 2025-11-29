@extends('webapp_layout.master')

@section('content')
    <div class="page-wrapper">
        <header class="header header-fixed">
            <div class="container">
                <div class="header-content">
                    <div class="left-content">
                        <a href="{{ env('Back_divar') }}" class="back-btn"><i class="icon feather icon-chevron-right"></i></a>
                    </div>
                    دیوار
                    <div class="mid-content">
                        <h6 class="title">{{ __('app.name_app') }}</h6>
                    </div>
                    <div class="right-content">
                        <a href="{{ route('profile.profile') }}" class="nav-link active"><i
                                class="icon feather icon-user"></i>
                            پروفایل
                        </a>
                    </div>
                </div>
            </div>
        </header>

        {{-- <div id="preloader">
            <div class="loader">
                <div class="load-circle">
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div> --}}
        <div class="page-content">
            <div class="account-box">
                <div class="container">
                    <div class="logo-area">
                        <img class="logo-dark" src="{{ asset('assets/images/serviceanswer/carkalafe.jpg') }}"
                            alt="">
                        <img class="logo-light" src="{{ asset('assets/images/serviceanswer/carkalafe.jpg') }}"
                            alt="">
                    </div>
                    <div class="section-head text-right pt-0">
                        <h2> استعلام خلافی</h2>
                        <div class="detail-content">
                            <p>سرویس استعلام خلافی خودرو به شما کمک می‌کند قبل از خرید یا فروش خودرو، از وضعیت دقیق
                                جرایم رانندگی آن مطلع شوید. با استفاده از این امکان، کاربران می‌توانند تنها با وارد کردن
                                اطلاعات لازم، مبالغ کل قابل پرداخت تخلفات را مشاهده
                                کنند.
                                <br>
                                <br>
                                این سرویس برای خریداران خودرو بسیار مفید است؛ زیرا با بررسی وضعیت خلافی، می‌توانند با
                                خیال راحت‌تری تصمیم بگیرند و از هزینه‌های پنهان احتمالی جلوگیری کنند. همچنین فروشندگان
                                نیز با ارائه گزارشی شفاف به خریداران، اعتماد بیشتری ایجاد کرده و فرآیند معامله را
                                آسان‌تر می‌کنند.
                                <br>
                                <br>
                                استفاده از این سرویس سریع، دقیق و کاملاً آنلاین است و تجربه‌ای مطمئن برای کاربران سایت
                                دیوار فراهم می‌آورد.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer fixed">
            <div class="container">
                <div class="seprate-box mb-3">
                    <a href="{{ route('kenar.login') }}" class="btn btn-primary w-100">استفاده از سرویس</a>
                </div>
                <div class="text-center text-primary">
                    <a href="" class="font-w500">بازگشت به دیوار</a>
                </div>
            </div>
        </footer>
    </div>
@endsection
