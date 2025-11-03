@extends('webapp_layout.master')
@section('content')
    <header class="header header-fixed">
        <div class="container">
            <div class="header-content">
                <div class="left-content">
                    <a href="{{ route('divar.index') }}" class="back-btn"><i class="icon feather icon-chevron-right"></i></a>
                </div>
                <div class="mid-content">
                    <h6 class="title">پروفایل</h6>
                </div>
                <div class="right-content">
                    <a href="javascript:void(0);"><i class="icon feather icon-more-vertical-"></i></a>
                </div>
            </div>
        </div>
    </header>
    <div class="page-content space-top">
        <div class="container">
            <div class="profile-area">
                <div class="main-profile">
                    <div class="media media-60 me-3 rounded-circle">
                        <img src="assets/images/user-profile.jpg" alt="تصویر پروفایل">
                    </div>
                    <div class="profile-detail">
                        <h6 class="name">توماس دیجون</h6>
                        <span class="font-12">شناسه 02123141</span>
                    </div>
                    <a href="edit-profile.html" class="edit-profile"><i class="icon feather icon-edit-2"></i></a>
                </div>
                {{-- <div class="content-box">
                    <ul class="row g-2">
                        <li class="col-6">
                            <a href="order.html">
                                <div class="dz-icon-box"><i class="icon feather icon-package"></i></div>
                                <span>سفارشات</span>
                            </a>
                        </li>
                        <li class="col-6">
                            <a href="wishlist.html">
                                <div class="dz-icon-box"><i class="icon feather icon-heart"></i></div>
                                <span>علاقه</span>
                            </a>
                        </li>
                        <li class="col-6">
                            <a href="coupon.html">
                                <div class="dz-icon-box"><i class="icon feather icon-gift"></i></div>
                                <span>کوپن‌ها</span>
                            </a>
                        </li>
                        <li class="col-6">
                            <a href="help.html">
                                <div class="dz-icon-box"><i class="icon feather icon-headphones"></i></div>
                                <span>مرکز کمک</span>
                            </a>
                        </li>
                    </ul>
                </div> --}}
                <div class="title-bar">
                    <h6 class="title mb-0">تنظیمات حساب کاربری</h6>
                </div>
                <div class="dz-list style-1">
                    <ul>
                        <li>
                            <a href="edit-profile.html" class="item-content item-link">
                                <div class="dz-icon"><i class="icon feather icon-user"></i></div>
                                <div class="dz-inner"><span class="title">ویرایش پروفایل</span></div>
                            </a>
                        </li>
                        {{-- <li>
                            <a href="address.html" class="item-content item-link">
                                <div class="dz-icon"><i class="icon feather icon-map-pin"></i></div>
                                <div class="dz-inner"><span class="title">آدرس‌های ذخیره شده</span></div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="item-content item-link" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasLang" aria-controls="offcanvasLang">
                                <div class="dz-icon"><i class="icon feather icon-type"></i></div>
                                <div class="dz-inner"><span class="title select-lang">انتخاب زبان</span></div>
                            </a>
                        </li> --}}
                        <li>
                            <a href="notification.html" class="item-content item-link">
                                <div class="dz-icon"><i class="icon feather icon-bell"></i></div>
                                <div class="dz-inner me-2"><span class="title">اعلان‌ها</span></div>
                                <div class="badge badge-primary">5</div>
                            </a>
                        </li>
                        <li>
                            <a href="welcome.html" class="item-content item-link">
                                <div class="dz-icon"><i class="icon feather icon-log-out"></i></div>
                                <div class="dz-inner"><span class="title">خروج</span></div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
