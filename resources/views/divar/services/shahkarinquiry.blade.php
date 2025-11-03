@extends('webapp_layout.master')
@section('content')
    <header class="header header-fixed">
        <div class="container">
            <div class="header-content">
                <div class="left-content">
                    <a href="{{ route('divar.index') }}" class="back-btn"><i class="icon feather icon-chevron-right"></i></a>
                    <h6 class="title"> تطابق کد ملی و شماره موبایل</h6>
                </div>
                <div class="mid-content"></div>
                <div class="right-content"></div>
            </div>
        </div>
    </header>
    <form action="{{ route('services.shahkarinquirypost') }}" method="post" enctype="multipart/form-data">

        <div class="page-content space-top p-b80">
            @csrf
            <div class="container">
                <h6 class="title border-bottom pb-2 mb-3">اطلاعات شخص</h6>
                <div class="mb-3">
                    <label class="form-label" for="phone"> کد ملی *</label>
                    <input type="number" name="codemele" id="phone" class="form-control" placeholder="">
                    <strong class="text-primary">
                        @error('codemele')
                            {{ $message }}
                        @enderror
                    </strong>
                </div>




                <div class="mb-3">
                    <label class="form-label" for="phone"> شماره موبایل *</label>
                    <input type="number" name="phone" id="phone" class="form-control" placeholder=" ">
                    <strong class="text-primary">
                        @error('phone')
                            {{ $message }}
                        @enderror
                    </strong>
                </div>

                <div class="divider border"></div>
                <h6>توضیحات</h6>
                <h7> استعلام شاهکار (تطابق کد ملی و شماره موبایل)</h7>
                <p>


                    برای اطمینان از صحت اطلاعات خریداران و فروشندگان می توانید از این سرویس استفاده کنید.
                    با استفاده از این سرویس، کد ملی و شماره موبایل کاربران تطبیق داده می‌شود تا مشخص شود شماره تلفن ثبت‌شده
                    واقعاً متعلق به همان فرد است.

                    این فرایند به افزایش اعتماد میان کاربران کمک می‌کند و باعث می‌شود خرید و فروش در دیوار با امنیت
                    بیشتری انجام شود.
                </p>
            </div>

        </div>

        {{-- <div class="footer fixed">
            <div class="container">
                <button class="btn btn-primary w-100" type="submit">استعلام</button>
            </div>
        </div> --}}
        <div class="footer fixed bg-white border-top">
            <div class="container py-2">
                <div class="total-cart">
                    <div class="price-area">
                        <h3 class="price">6,000 تومان<del></del></h3>
                        <span class="font-w500 text-primary">هزینه سرویس</span>
                    </div>
                    <button class="btn btn-primary" type="submit">استعلام</button>
                </div>
            </div>
        </div>
    </form>
@endsection
