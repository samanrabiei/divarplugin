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
                    <label class="form-label" for="phone">کد ملی</label>
                    <input type="number" name="codemele" id="phone" class="form-control" placeholder="">
                </div>
                @error('codemele')
                    {{ $message }}
                @enderror
                <div class="mb-3">
                    <label class="form-label" for="phone">شماره موبایل</label>
                    <input type="number" name="phone" id="phone" class="form-control" placeholder=" ">
                </div>
                @error('phone')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="footer fixed">
            <div class="container">
                <button class="btn btn-primary w-100" type="submit">استعلام</button>
            </div>
        </div>
    </form>
@endsection
