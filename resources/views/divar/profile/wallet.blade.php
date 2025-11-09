@extends('webapp_layout.master')
@section('content')
    <header class="header header-fixed">
        <div class="container">
            <div class="header-content">
                <div class="left-content">
                    <a href="{{ route('divar.index') }}" class="back-btn"><i class="icon feather icon-chevron-right"></i></a>
                </div>
                <div class="mid-content">
                    <h6 class="title">کیف پول</h6>
                </div>
                <div class="right-content">
                    <a href="javascript:void(0);"><i class="icon feather icon-more-vertical-"></i></a>
                </div>
            </div>
        </div>
    </header>
    <div class="page-content space-top">
        <div class="container">
            <div class="offcanvas-body">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">بانک های محبوب</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <a href="javascript:void(0):" class="media media-50">
                                    <img src="assets/images/bank/bank1.svg" alt="">
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="javascript:void(0):" class="media media-50">
                                    <img src="assets/images/bank/bank2.svg" alt="">
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="javascript:void(0):" class="media media-50">
                                    <img src="assets/images/bank/bank3.svg" alt="">
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="javascript:void(0):" class="media media-50">
                                    <img src="assets/images/bank/bank4.svg" alt="">
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="javascript:void(0):" class="media media-50">
                                    <img src="assets/images/bank/bank5.svg" alt="">
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="javascript:void(0):" class="media media-50">
                                    <img src="assets/images/bank/bank6.svg" alt="">
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="javascript:void(0):" class="media media-50">
                                    <img src="assets/images/bank/bank7.svg" alt="">
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="javascript:void(0):" class="media media-50">
                                    <img src="assets/images/bank/bank8.svg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <h6 class="title-bar">همه بانک ها</h6>
                <ul class="item-list mb-3">
                    <li class="list">
                        <a href="javascript:void(0);">
                            <i class="icon feather icon-arrow-right mt-1 ms-2"></i>
                            بانک هند
                        </a>
                    </li>
                    <li class="list">
                        <a href="javascript:void(0);">
                            <i class="icon feather icon-arrow-right mt-1 ms-2"></i>
                            بانک ماهاراسترا
                        </a>
                    </li>
                    <li class="list">
                        <a href="javascript:void(0);">
                            <i class="icon feather icon-arrow-right mt-1 ms-2"></i>
                            بانک کانارا
                        </a>
                    </li>
                    <li class="list">
                        <a href="javascript:void(0);">
                            <i class="icon feather icon-arrow-right mt-1 ms-2"></i>
                            بانک HDFC
                        </a>
                    </li>
                    <li class="list">
                        <a href="javascript:void(0);">
                            <i class="icon feather icon-arrow-right mt-1 ms-2"></i>
                            بانک IDFC
                        </a>
                    </li>
                    <li class="list">
                        <a href="javascript:void(0);">
                            <i class="icon feather icon-arrow-right mt-1 ms-2"></i>
                            بانک کاتولیک سوریه
                        </a>
                    </li>
                    <li class="list">
                        <a href="javascript:void(0);">
                            <i class="icon feather icon-arrow-right mt-1 ms-2"></i>
                            بانک کاتولیک سوریه
                        </a>
                    </li>
                    <li class="list">
                        <a href="javascript:void(0);">
                            <i class="icon feather icon-arrow-right mt-1 ms-2"></i>
                            بانک مرکزی هند
                        </a>
                    </li>
                    <li class="list">
                        <a href="javascript:void(0);">
                            <i class="icon feather icon-arrow-right mt-1 ms-2"></i>
                            بانک سیتی یونیون
                        </a>
                    </li>
                    <li class="list">
                        <a href="javascript:void(0);">
                            <i class="icon feather icon-arrow-right mt-1 ms-2"></i>
                            بانک شرکت
                        </a>
                    </li>
                    <li class="list">
                        <a href="javascript:void(0);">
                            <i class="icon feather icon-arrow-right mt-1 ms-2"></i>
                            بانک کیهان
                        </a>
                    </li>
                </ul>
                <button type="button" class="btn btn-outline-primary d-block w-100 mt-auto" data-bs-dismiss="offcanvas"
                    aria-label="Close">
                    <i class="icon feather icon-arrow-left mt-1 ms-2"></i>
                    <span>بازگشت</span>
                </button>
            </div>
        </div>
    </div>
@endsection
