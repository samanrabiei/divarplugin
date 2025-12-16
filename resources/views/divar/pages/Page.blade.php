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
                    @auth
                        <div class="right-content">
                            <a href="{{ route('profile.profile') }}" class="">
                                <i class="icon feather icon-user"></i>
                                پروفایل
                            </a>
                        </div>
                    @endauth
                    @guest
                        <div class="right-content">
                            <a href="{{ route('profile.profile') }}" class="">
                                <i class="icon feather icon-user"></i>
                                ورود/ثبت نام
                            </a>
                        </div>
                    @endguest
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
                <div class="container pt-5">

                    <div class="section-head text-right pt-5">
                        <h2> {{ $page->title }}</h2>
                        <div class="detail-content PT-3">

                            {!! $page->content !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
