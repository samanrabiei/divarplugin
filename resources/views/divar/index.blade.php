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
                <div class="tab-slide-effect">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                        <li class="tab-active-indicator" style="width: 90.7188px; transform: translateX(0px);"></li>

                        <li class="nav-item active" role="presentation">
                            <button class="nav-link active" id="home-tab2" data-bs-toggle="tab"
                                data-bs-target="#home-tab-pane2" type="button" role="tab"
                                aria-controls="home-tab-pane2" aria-selected="true">همه</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab2" data-bs-toggle="tab"
                                data-bs-target="#profile-tab-pane2" type="button" role="tab"
                                aria-controls="profile-tab-pane2" aria-selected="false"> احراز هویت</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab2" data-bs-toggle="tab"
                                data-bs-target="#contact-tab-pane2" type="button" role="tab"
                                aria-controls="contact-tab-pane2" aria-selected="false">استعلام بانکی</button>
                        </li>
                        <li class="nav-item " role="presentation">
                            <button class="nav-link " id="order-tab2" data-bs-toggle="tab" data-bs-target="#order-tab-pane2"
                                type="button" role="tab" aria-controls="order-tab-pane2" aria-selected="false">
                                استعلام خدماتی</button>
                        </li>
                    </ul>
                </div>

                <div class="tab-content pt-0" id="myTabContent2">

                    <div class="tab-pane fade active show" id="home-tab-pane2" role="tabpanel" aria-labelledby="home-tab2"
                        tabindex="0">
                        <div class="row">
                            <!-- Page Content Start -->
                            <div class="page-content space-top">
                                <div class="container">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header border-0 pb-0">
                                                <h5 class="card-title"> تطابق کد ملی و شماره موبایل
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text"> با این سرویس شماره موبایل طرف مقابل را با کد ملی او
                                                    طبیق دهید تا مطمئن شوید که شماره موبایل متعلق به خود اوست.
                                                </p>
                                            </div>
                                            <div class="card-footer border-0 pt-0">
                                                <p class="card-text d-inline"> 6000 تومان</p>
                                                <a href="javascript:void(0);" class="card-link float-end"> استعلام
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="profile-tab-pane2" role="tabpanel" aria-labelledby="profile-tab2"
                        tabindex="0">
                        <div class="row">
                            <!-- Page Content Start -->
                            <div class="page-content space-top">
                                <div class="container">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header border-0 pb-0">
                                                <h5 class="card-title"> تطابق کد ملی و شماره موبایل
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text"> با این سرویس شماره موبایل طرف مقابل را با کد ملی او
                                                    طبیق دهید تا مطمئن شوید که شماره موبایل متعلق به خود اوست.
                                                </p>
                                            </div>
                                            <div class="card-footer border-0 pt-0">
                                                <p class="card-text d-inline"> 6000 تومان</p>
                                                <a href="{{ route('services.shahkarinquiry') }}"
                                                    class="card-link float-end"> استعلام
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="contact-tab-pane2" role="tabpanel"
                                aria-labelledby="contact-tab2" tabindex="0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="dz-order">
                                            <div class="order-info">
                                                <div class="pe-3">
                                                    <span class="productId">#12451245</span>
                                                    <h6 class="title"><a href="product-detail.html">پیراهن زنانه قهوه‌ای
                                                            از پارچه
                                                            Coklat</a></h6>
                                                </div>
                                                <div class="media media-70">
                                                    <img src="assets/images/popular/small/pic1.png" alt="">
                                                </div>
                                            </div>
                                            <div class="order-detail">
                                                <span>مدل خاکستری</span>
                                                <div class="d-flex gap-5">
                                                    <span class="quantity">1x</span>
                                                    <h5 class="price">47.6</h5>
                                                </div>
                                            </div>
                                            <div class="status">
                                                <a href="javascript:void(0);"
                                                    class="badge badge-lg badge-outline-success me-4">
                                                    <i class="fa-solid fa-circle"></i>
                                                    <span>تکمیل شده</span>
                                                </a>
                                                <p class="mb-0 description">سفارش دریافت شده توسط [لویی سیماتوپنگ]</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="order-tab-pane2" role="tabpanel" aria-labelledby="order-tab2"
                                tabindex="0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="dz-order">
                                            <div class="order-info">
                                                <div class="pe-3">
                                                    <span class="productId">#12451245</span>
                                                    <h6 class="title"><a href="product-detail.html">لباس خواب زنانه از
                                                            برند
                                                            Femall</a></h6>
                                                </div>
                                                <div class="media media-70">
                                                    <img src="assets/images/popular/small/pic2.png" alt="">
                                                </div>
                                            </div>
                                            <div class="order-detail">
                                                <span>مدل خاکستری</span>
                                                <div class="d-flex gap-5">
                                                    <span class="quantity">2x</span>
                                                    <h5 class="price">47.6</h5>
                                                </div>
                                            </div>
                                            <div class="status">
                                                <a href="javascript:void(0);"
                                                    class="badge badge-lg badge-outline-success me-4">
                                                    <i class="fa-solid fa-circle"></i>
                                                    <span>تکمیل شده</span>
                                                </a>
                                                <p class="mb-0 description">رسیده به تاریخ سررسید پرداخت</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content End -->
@endsection
