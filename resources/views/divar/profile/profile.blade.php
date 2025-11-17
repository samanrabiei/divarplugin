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

                    {{-- toast --}}
                    <x-toast.toast />
                    {{-- End toast --}}

                    {{-- <div class="media media-60 me-3 rounded-circle">
                        <img src="assets/images/user-profile.jpg" alt="تصویر پروفایل">
                    </div> --}}
                    <div class="profile-detail">
                        <h6 class="name"> {{ $user->phone }}</h6>
                        <span class="font-12">شما با شماره {{ $user->phone }} وارد شده اید.</span>
                    </div>
                    {{-- <a href="edit-profile.html" class="edit-profile"><i class="icon feather icon-edit-2"></i></a> --}}
                </div>
                <div class="content-box">
                    <ul class="row g-2">
                        <li class="col-12">
                            <a href="javascript:void(0);" class="item-content item-link" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasLang" aria-controls="offcanvasLang">
                                <div class="dz-icon-box"><i class="icon feather icon-briefcase"></i></div>
                                <span>موجودی: {{ $wallet }} تومان</span>
                            </a>
                        </li>

                        {{-- <li class="col-6">
                            <a href="wishlist.html">
                                <div class="dz-icon-box"><i class="icon feather icon-heart"></i></div>
                                <span>علاقه</span>
                            </a>
                        </li> --}}
                        {{-- <li class="col-6">
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
                        </li> --}}
                    </ul>
                </div>
                <div class="title-bar">
                    <h6 class="title mb-0">تنظیمات حساب کاربری</h6>
                </div>
                <div class="dz-list style-1">
                    <ul>
                        {{-- <li>
                            <a href="edit-profile.html" class="item-content item-link">
                                <div class="dz-icon"><i class="icon feather icon-user"></i></div>
                                <div class="dz-inner"><span class="title">ویرایش پروفایل</span></div>
                            </a>
                        </li> --}}
                        {{-- <li>
                            <a href="address.html" class="item-content item-link">
                                <div class="dz-icon"><i class="icon feather icon-map-pin"></i></div>
                                <div class="dz-inner"><span class="title">آدرس‌های ذخیره شده</span></div>
                            </a>
                        </li> --}}
                        <li>
                            <a href="javascript:void(0);" class="item-content item-link" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasLang" aria-controls="offcanvasLang">
                                <div class="dz-icon"><i class="icon feather icon-plus"></i></div>
                                <div class="dz-inner"><span class="title select-lang">افزایش موجودی</span></div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="item-content item-link">
                                <div class="dz-icon"><i class="icon feather icon-bell"></i></div>
                                <div class="dz-inner me-2"><span class="title">اعلان‌ها</span></div>
                                <div class="badge badge-primary">0</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" class="item-content item-link">
                                <div class="dz-icon"><i class="icon feather icon-log-out"></i></div>
                                <div class="dz-inner"><span class="title">خروج</span></div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas offcanvas-bottom m-3 rounded" tabindex="-1" id="offcanvasLang">
        <div class="offcanvas-header border-0 pb-0">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">افزایش موجودی</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="بستن"><i
                    class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="offcanvas-body small">
            <div class="dz-list">
                <ul class="mb-2 confirm-lang" id="amountList">
                    <li data-amount="20000">
                        <a href="#" class="item-content py-2 item-link">
                            <div class="media media-30 me-3"><img src="assets/images/flags/1m.svg"></div>
                            <div class="dz-inner"><span class="title">20 هزار تومان</span></div>
                        </a>
                    </li>
                    <li data-amount="50000">
                        <a href="#" class="item-content py-2 item-link">
                            <div class="media media-30 me-3"><img src="assets/images/flags/2m.svg"></div>
                            <div class="dz-inner"><span class="title">50 هزار تومان</span></div>
                        </a>
                    </li>
                    <li data-amount="100000">
                        <a href="#" class="item-content py-2 item-link">
                            <div class="media media-30 me-3"><img src="assets/images/flags/3m.svg"></div>
                            <div class="dz-inner"><span class="title">100 هزار تومان</span></div>
                        </a>
                    </li>
                </ul>

                <form id="sendAmountForm" action="{{ route('profile.wallet.post') }}" method="POST" style="display:none;">
                    @csrf
                    <input type="hidden" name="amount" id="amountInput">
                </form>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('#amountList li').forEach(function(item) {
            item.addEventListener('click', function() {
                let amount = this.getAttribute('data-amount');
                document.getElementById('amountInput').value = amount;
                document.getElementById('sendAmountForm').submit();
            });
        });
    </script>
@endsection
