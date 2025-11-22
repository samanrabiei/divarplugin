@extends('admin.layout.layout')
@php
    $title = 'View Profile';
    $subTitle = 'View Profile';
    $script = '<script>
        // ======================== Upload Image Start =====================
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#imagePreview").css("background-image", "url(" + e.target.result + ")");
                    $("#imagePreview").hide();
                    $("#imagePreview").fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });
        // ======================== Upload Image End =====================

        // ================== Password Show Hide Js Start ==========
        function initializePasswordToggle(toggleSelector) {
            $(toggleSelector).on("click", function() {
                $(this).toggleClass("ri-eye-off-line");
                var input = $($(this).attr("data-toggle"));
                if (input.attr("type") === "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        }
        // Call the function
        initializePasswordToggle(".toggle-password");
        // ========================= Password Show Hide Js End ===========================
    </script>';
@endphp

@section('content')
    <div class="row gy-4">
        <div class="col-lg-4">
            <div class="user-grid-card position-relative border radius-16 overflow-hidden bg-base h-100">
                <img src="{{ asset('assets/images/user-grid/user-grid-bg1.png') }}" alt=""
                    class="w-100 object-fit-cover">
                <div class="pb-24 ms-16 mb-24 me-16  mt--100">
                    <div class="text-center border border-top-0 border-start-0 border-end-0">
                        <img src="{{ asset('assets/images/user-grid/user-grid-img14.png') }}" alt=""
                            class="border br-white border-width-2-px w-200-px h-200-px rounded-circle object-fit-cover">
                        <h6 class="mb-0 mt-16">موبایل </h6>
                        <span class="text-secondary-light mb-16">{{ $customer->phone }}</span>
                    </div>

                    <div class="mt-24">
                        <h6 class="text-xl mb-16">اطلاعات کاربر </h6>
                        <ul>
                            <li class="d-flex align-items-center gap-1 mb-12">
                                <span class="w-30 text-md fw-semibold text-primary-light">موجودی: </span>
                                <span
                                    class="w-70 text-secondary-light fw-medium">{{ number_format($customer->wallet->balance) }}
                                    تومان</span>
                            </li>
                            <li class="d-flex align-items-center gap-1 mb-12">
                                <span class="w-30 text-md fw-semibold text-primary-light"> توکن</span>
                                <span class="w-70 text-secondary-light fw-medium">:{{ $customer->token }}</span>
                            </li>
                            <li class="d-flex align-items-center gap-1 mb-12">
                                <span class="w-30 text-md fw-semibold text-primary-light">دسترسی</span>
                                <span class="w-70 text-secondary-light fw-medium">: {{ $customer->role_id }} </span>
                            </li>
                            <li class="d-flex align-items-center gap-1 mb-12">
                                <span class="w-30 text-md fw-semibold text-primary-light">مدیر هست</span>
                                <span class="w-70 text-secondary-light fw-medium">:

                                    @if ($customer->is_admin == 1)
                                        {
                                        بله
                                        }
                                    @else
                                        خیر
                                    @endif
                                </span>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card h-100">
                <div class="card-body p-24">
                    <ul class="nav border-gradient-tab nav-pills mb-20 d-inline-flex" id="pills-tab" role="tablist">
                        {{-- <li class="nav-item" role="presentation">
                            <button class="nav-link d-flex align-items-center px-24 active" id="pills-edit-profile-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-edit-profile" type="button" role="tab"
                                aria-controls="pills-edit-profile" aria-selected="true">
                                Edit Profile
                            </button>
                        </li> --}}
                        {{-- <li class="nav-item" role="presentation">
                            <button class="nav-link d-flex align-items-center px-24" id="pills-change-passwork-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-change-passwork" type="button" role="tab"
                                aria-controls="pills-change-passwork" aria-selected="false" tabindex="-1">
                                Change Password
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link d-flex align-items-center px-24" id="pills-notification-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-notification" type="button" role="tab"
                                aria-controls="pills-notification" aria-selected="false" tabindex="-1">
                                Notification Settings
                            </button>
                        </li> --}}
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-edit-profile" role="tabpanel"
                            aria-labelledby="pills-edit-profile-tab" tabindex="0">
                            <h6 class="text-md text-primary-light mb-16">کیف پول </h6>
                            <div class="card h-100">
                                <div class="card-body p-24">
                                    <span class="mb-4 text-sm text-secondary-light">موجودی </span>
                                    <h6 class="mb-4">{{ number_format($customer->wallet->balance) }} تومان</h6>

                                    <ul class="nav nav-pills pill-tab mb-24 mt-28 border input-form-light p-1 radius-8 bg-neutral-50"
                                        id="pills-tab" role="tablist">
                                        <li class="nav-item w-50" role="presentation">
                                            <button class="nav-link px-12 py-10 text-md w-100 text-center radius-8 active"
                                                id="pills-Buy-tab" data-bs-toggle="pill" data-bs-target="#pills-Buy"
                                                type="button" role="tab" aria-controls="pills-Buy"
                                                aria-selected="true">واریز</button>
                                        </li>
                                        <li class="nav-item w-50" role="presentation">
                                            <button class="nav-link px-12 py-10 text-md w-100 text-center radius-8"
                                                id="pills-Sell-tab" data-bs-toggle="pill" data-bs-target="#pills-Sell"
                                                type="button" role="tab" aria-controls="pills-Sell"
                                                aria-selected="false">برداشت</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-Buy" role="tabpanel"
                                            aria-labelledby="pills-Buy-tab" tabindex="0">
                                            <div class="mb-20">
                                                <label for="estimatedValue" class="fw-semibold mb-8 text-primary-light">
                                                    مبلغ را وارد نمایید</label>
                                                <div class="input-group input-group-lg border input-form-light radius-8">
                                                    <input type="text" class="form-control bg-base border-0 radius-8"
                                                        id="estimatedValue" placeholder="مبلغ">
                                                    <div
                                                        class="input-group-text bg-neutral-50 border-0 fw-normal text-md ps-1 pe-1">
                                                        تومان
                                                    </div>
                                                </div>
                                            </div>



                                            <a href=""
                                                class="btn btn-primary text-sm btn-sm px-8 py-12 w-100 radius-8">
                                                افزایش موجودی</a>
                                        </div>
                                        <div class="tab-pane fade" id="pills-Sell" role="tabpanel"
                                            aria-labelledby="pills-Sell-tab" tabindex="0">
                                            <div class="mb-20">
                                                <label for="estimatedValue" class="fw-semibold mb-8 text-primary-light">
                                                    مبلغ را وارد نمایید</label>
                                                <div class="input-group input-group-lg border input-form-light radius-8">
                                                    <input type="text" class="form-control bg-base border-0 radius-8"
                                                        id="estimatedValue" placeholder="مبلغ">
                                                    <div
                                                        class="input-group-text bg-neutral-50 border-0 fw-normal text-md ps-1 pe-1">
                                                        تومان
                                                    </div>
                                                </div>
                                            </div>

                                            <a href=""
                                                class="btn btn-primary text-sm btn-sm px-8 py-12 w-100 radius-8">
                                                برداشت موجودی</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-change-passwork" role="tabpanel"
                        aria-labelledby="pills-change-passwork-tab" tabindex="0">
                        <div class="mb-20">
                            <label for="your-password" class="form-label fw-semibold text-primary-light text-sm mb-8">New
                                Password <span class="text-danger-600">*</span></label>
                            <div class="position-relative">
                                <input type="password" class="form-control radius-8" id="your-password"
                                    placeholder="Enter New Password*">
                                <span
                                    class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light"
                                    data-toggle="#your-password"></span>
                            </div>
                        </div>
                        <div class="mb-20">
                            <label for="confirm-password"
                                class="form-label fw-semibold text-primary-light text-sm mb-8">Confirmed Password <span
                                    class="text-danger-600">*</span></label>
                            <div class="position-relative">
                                <input type="password" class="form-control radius-8" id="confirm-password"
                                    placeholder="Confirm Password*">
                                <span
                                    class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light"
                                    data-toggle="#confirm-password"></span>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-notification" role="tabpanel"
                        aria-labelledby="pills-notification-tab" tabindex="0">
                        <div class="form-switch switch-primary py-12 px-16 border radius-8 position-relative mb-16">
                            <label for="companzNew" class="position-absolute w-100 h-100 start-0 top-0"></label>
                            <div class="d-flex align-items-center gap-3 justify-content-between">
                                <span class="form-check-label line-height-1 fw-medium text-secondary-light">Company
                                    News</span>
                                <input class="form-check-input" type="checkbox" role="switch" id="companzNew">
                            </div>
                        </div>
                        <div class="form-switch switch-primary py-12 px-16 border radius-8 position-relative mb-16">
                            <label for="pushNotifcation" class="position-absolute w-100 h-100 start-0 top-0"></label>
                            <div class="d-flex align-items-center gap-3 justify-content-between">
                                <span class="form-check-label line-height-1 fw-medium text-secondary-light">Push
                                    Notification</span>
                                <input class="form-check-input" type="checkbox" role="switch" id="pushNotifcation"
                                    checked>
                            </div>
                        </div>
                        <div class="form-switch switch-primary py-12 px-16 border radius-8 position-relative mb-16">
                            <label for="weeklyLetters" class="position-absolute w-100 h-100 start-0 top-0"></label>
                            <div class="d-flex align-items-center gap-3 justify-content-between">
                                <span class="form-check-label line-height-1 fw-medium text-secondary-light">Weekly News
                                    Letters</span>
                                <input class="form-check-input" type="checkbox" role="switch" id="weeklyLetters"
                                    checked>
                            </div>
                        </div>
                        <div class="form-switch switch-primary py-12 px-16 border radius-8 position-relative mb-16">
                            <label for="meetUp" class="position-absolute w-100 h-100 start-0 top-0"></label>
                            <div class="d-flex align-items-center gap-3 justify-content-between">
                                <span class="form-check-label line-height-1 fw-medium text-secondary-light">Meetups
                                    Near you</span>
                                <input class="form-check-input" type="checkbox" role="switch" id="meetUp">
                            </div>
                        </div>
                        <div class="form-switch switch-primary py-12 px-16 border radius-8 position-relative mb-16">
                            <label for="orderNotification" class="position-absolute w-100 h-100 start-0 top-0"></label>
                            <div class="d-flex align-items-center gap-3 justify-content-between">
                                <span class="form-check-label line-height-1 fw-medium text-secondary-light">Orders
                                    Notifications</span>
                                <input class="form-check-input" type="checkbox" role="switch" id="orderNotification"
                                    checked>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
