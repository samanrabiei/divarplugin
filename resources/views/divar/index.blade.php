@extends('webapp_layout.master')
@section('content')
    <!-- Header -->
    <header class="header header-fixed">
        <div class="container">
            <div class="header-content">
                <div class="left-content">
                    {{-- <a href="javascript:void(0);" class="back-btn">
                        <i class="icon feather icon-chevron-right"></i>
                    </a> --}}
                    <h6 class="title">سرویس ها</h6>
                </div>
                <div class="mid-content">
                </div>
                <div class="right-content">
                    <a href="{{ route('profile.profile') }}" class="nav-link active"><i class="icon feather icon-user"></i>
                    </a>

                </div>

            </div>
        </div>
    </header>
    <!-- Header -->


    <!-- Page Content Start -->
    <div class="page-content space-top">

        <div class="container p-0">
            <div class="dz-tab style-1 tab-fixed">
                {{-- toast --}}
                <x-toast.toast />
                {{-- End toast --}}
                <div class="page-content  p-b65">
                    <div class="container py-0">

                        <div class="product-items-list">
                            <ul>
                                <li>
                                    <div class="product-items"><a href="{{ route('services.shahkarinquiry') }}">
                                            <div class="media media-80 ms-2"><img src="assets/images/product/pic12.png"
                                                    alt="">
                                            </div>
                                        </a><a href="cart.html">
                                            <div class="product-content">
                                                <h6 class="title"> استعلام کارت ملی و شماره موبایل</h6>
                                                <div class="desc"> با این سرویس کد ملی و شماره موبایل خود را تطبیق دهید
                                                </div>
                                                <div class="product-footer">

                                                    <span class="price">۱,۲۹۹ تومان
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="cart.html" class="btn btn-primary  dz-icon">
                                            استعلام
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="product-items"><a href="{{ route('services.VehicleViolation') }}">
                                            <div class="media media-80 ms-2"><img src="assets/images/product/pic12.png"
                                                    alt="">
                                            </div>
                                        </a><a href="{{ route('services.VehicleViolation') }}">
                                            <div class="product-content">
                                                <h6 class="title"> استعلام خلافی خودرو </h6>
                                                <div class="desc"> از طریق این سرویس می تواند میزان خلافی های خودرو را
                                                    استعلام نمود.
                                                </div>
                                                <div class="product-footer">

                                                    <span class="price">30,000 تومان
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="{{ route('services.VehicleViolation') }}" class="btn btn-primary  dz-icon">
                                            استعلام
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content End -->
@endsection
