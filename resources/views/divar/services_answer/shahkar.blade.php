@extends('webapp_layout.master')

@section('content')
    <header class="header header-fixed">
        <div class="container">
            <div class="header-content">
                <div class="left-content">
                    <a href="javascript:void(0);" class="back-btn">
                        <i class="icon feather icon-chevron-right"></i>
                    </a>
                    <h6 class="title">{{ __('app.Request result') }}</h6>
                </div>
                <div class="mid-content">
                </div>
                <div class="right-content">
                </div>
            </div>
        </div>
    </header>
    <div class="page-content space-top p-b80">
        <div class="container"><a href="{{ route('services.shahkarinquiry') }}"
                class="btn btn-outline-primary btn-block mb-3">
                {{ __('app.this service requist return') }}
            </a>

            <h6 class="title">
                {{ __('app.Mobile number and national ID matching (Shahkar identity verification)') }}
            </h6>
            <div class="card address-card">
                <div class="card-header border-0"><span class="name text-secondary font-w500">
                        {{ $messages['header'] }}</span>
                    <div class="{{ $messages['badge-class'] }}"> {{ $messages['badge'] }}</div>
                </div>
                <div class="card-body">
                    <ul>
                        <span>{{ __('app.mobile') }} :{{ $service['phone'] }}</span>
                    </ul>
                    <ul>
                        <span> {{ __('app.codemele') }} : {{ $service['codemele'] }}</span>
                    </ul>
                    <ul>
                        <li>
                            {{ $messages['message'] }}
                        </li>
                    </ul>
                </div>
                <div class="card-footer"><a class="footer-link text-danger"
                        href="https://open-platform-redirect.divar.ir/completion">{{ __('app.return to divar') }}</a><a
                        class="footer-link" href="{{ route('divar.index') }}"> {{ __('app.return to services') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
