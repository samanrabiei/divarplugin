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
                        <h6 class="title">سوابق استعلام ها</h6>
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


        <div class="page-content dz-tab style-1 tab-fixed">
            <div class="account-box">
                <div class="container">
                    <div class="tab-content pt-0" id="myTabContent2">
                        <div class="tab-pane fade active show" id="home-tab-pane2" role="tabpanel"
                            aria-labelledby="home-tab2" tabindex="0">
                            <div class="row">
                                @foreach ($records as $record)
                                    <div class="col-12">
                                        <div class="dz-order">
                                            <div class="order-info">
                                                <div class="pe-3">
                                                    <span class="productId">{{ $record->endpoint }}</span>
                                                    <h6 class="title"><a
                                                            href="{{ route('records.view', $record->endpoint) }} "> استعلام
                                                            خلافی خودرو
                                                        </a></h6>
                                                </div>

                                            </div>
                                            <div class="order-detail">
                                                <span>{{ $record->response['data']['totalAmount'] }} ریال </span>
                                                <div class="d-flex gap-5">
                                                    <h5 class="price"> {{ $record->payload['plateNumber'] ?? '-' }} </h5>
                                                </div>
                                            </div>
                                            <div class="status">
                                                <a href="{{ route('records.view', $record->endpoint) }}"
                                                    class="badge badge-lg badge-outline-success me-4">
                                                    <i class="fa-solid fa-eye"></i>
                                                    <span> مشاهده</span>
                                                </a>
                                                <p class="mb-0 description">{{ verta($record->created_at) }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                                {{-- <div class="card-body">
                                    <nav>
                                        <ul class="pagination pagination-sm pagination-gutter pagination-info">
                                            <li class="page-item page-indicator">
                                                <a class="page-link" href="javascript:void(0)">
                                                    <i class="icon feather icon-chevron-right"></i></a>
                                            </li>
                                            <li class="page-item active"><a class="page-link"
                                                    href="javascript:void(0)">1</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a>
                                            </li>
                                            <li class="page-item page-indicator">
                                                <a class="page-link" href="javascript:void(0)">
                                                    <i class="icon feather icon-chevron-left"></i></a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
