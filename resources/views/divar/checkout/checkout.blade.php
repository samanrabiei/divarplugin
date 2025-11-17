@extends('webapp_layout.master')
@section('content')
    <!-- Header -->
    <header class="header header-fixed">
        <div class="container">
            <div class="header-content">
                <div class="left-content">
                    <a href="{{ url()->previous() }}" class="back-btn">
                        <i class="icon feather icon-chevron-right"></i>
                    </a>
                    <h6 class="title">پرداخت</h6>
                </div>
                <div class="mid-content">
                </div>
                <div class="right-content">
                </div>
            </div>
        </div>
    </header>
    <!-- Header -->
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('invoice.pay') }}" method="POST">
        @csrf
        <!-- Page Content Start -->
        <div class="page-content space-top p-b50">
            <div class="container">
                <div class="accordion dz-accordion accordion-full" id="accordionExample">

                    <div class="accordion-item">


                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <span class="media media-25 me-3">
                                    <img src="{{ asset('assets/images/icons/card.png') }}" alt="/">
                                </span>
                                پرداخت اینترنتی

                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <small class="font-w600 mb-2 text-dark">با انتخاب یکی از درگاه های زیر و از طریق تمامی کارت
                                    های
                                    عضو شبکه شتاب</small>
                                <!-- Card Select -->
                                <div class="d-flex align-items-center mb-3">

                                    <!-- Card Select -->
                                    <div class="short-tag style-4" role="group" aria-label="radio toggle button">
                                        <div class="clearfix">
                                            <input type="radio" class="btn-check" name="zarinpall" id="getway"
                                                checked="">
                                            <label class="btn ms-3 mb-0 tag-btn" for="btnradio1">
                                                <img src="{{ asset('assets/images/payment/zarinpall.png') }}"
                                                    alt="">
                                            </label>

                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="view-cart style-2">
                    <h6 class="title border-bottom pb-2">صورتحساب</h6>
                    <ul>
                        <li>
                            <span class="name">مبلغ :</span>
                            <span class="font-w500"> {{ number_format($transaction['price']) }} تومان</span>
                        </li>
                        <li>
                            <span class="name">تخفیف :</span>
                            <span class="font-w500">0</span>
                        </li>
                        <li>
                            <span class="name"> مالیات :</span>
                            <span class="font-w500">0</span>
                        </li>
                        <li>
                            <span class="name"> کارمزد درگاه پرداخت :</span>
                            <span class="font-w500">0</span>
                        </li>
                        <li class="divider style-2 mt-0 pb-0"></li>
                        <li>
                            <span class="name">مبلغ کل</span>
                            <h4 class="price">{{ number_format($transaction['price']) }} تومان</h4>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Page Content End -->
        <!-- Footer Start -->
        <div class="footer fixed bg-white border-top">
            <div class="container py-2">
                <div class="total-cart">
                    <div class="price-area">
                        <span> مبلغ پرداختی </span>
                        <h5 class="price text-secondary">
                            {{ number_format($transaction['price']) }} تومان
                        </h5>
                    </div>




                    <input type="hidden" name="price" value="{{ $transaction['price'] }}">
                    <input type="hidden" name="transactions_id" value="{{ $transaction['transactions_id'] }}">

                    <button type="submit" class="btn btn-primary w-100">پرداخت</button>

                </div>
            </div>
        </div>
    </form>
    <!-- Footer End -->
@endsection
