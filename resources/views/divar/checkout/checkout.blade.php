@extends('webapp_layout.master')
@section('content')
    <!-- Header -->
    <header class="header header-fixed">
        <div class="container">
            <div class="header-content">
                <div class="left-content">
                    <a href="javascript:void(0);" class="back-btn">
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
                            درگاه های پرداخت
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">

                            <!-- Card Select -->
                            <div class="d-flex align-items-center mb-3">

                                <!-- Card Select -->
                                <div class="short-tag style-4" role="group" aria-label="radio toggle button">
                                    <div class="clearfix">
                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1"
                                            checked="">
                                        <label class="btn ms-2 mb-0 tag-btn" for="btnradio1">
                                            <img src="{{ asset('assets/images/payment/zarinpall.png') }}" alt="">
                                        </label>
                                    </div>


                                </div>
                            </div>
                            <div class="payment-card">
                                <div class="card-media">
                                    <img src="assets/images/payment/card.png" alt="">
                                </div>
                                <div class="card-info">
                                    <div class="clearfix">
                                        <h5 class="card-name">کارت اعتباری</h5>
                                        <p class="card-number">4532 **** **** ****</p>
                                    </div>
                                    <div class="bottom-info">
                                        <p>04 / 25</p>
                                        <p>کوین هارد</p>
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
                        <span class="name">تخفیف </span>
                        <span class="font-w500">0</span>
                    </li>
                    <li>
                        <span class="name"> مالیات </span>
                        <span class="font-w500">0</span>
                    </li>
                    <li>
                        <span class="name"> کارمزد درگاه پرداخت</span>
                        <span class="font-w500">0</span>
                    </li>
                    <li class="divider style-2 mt-0 pb-0"></li>
                    <li>
                        <span class="name">مبلغ کل</span>
                        <h4 class="price">759 تومان</h4>
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
                    <h5 class="price text-secondary">759 تومان</h5>
                    <span> پرداخت می کنید</span>
                </div>
                <a href="tracking-order.html" class="btn btn-primary w-100">اکنون پرداخت کنید</a>
            </div>
        </div>
    </div>
    <!-- Footer End -->
@endsection
