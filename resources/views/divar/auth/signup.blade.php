@extends('webapp_layout.master')
@section('content')
    <div class="page-content">
        <div class="account-box">
            <div class="container">
                <div class="logo-area">
                    <img class="logo-dark" src="assets/images/logo.png" alt="">
                    <img class="logo-light" src="assets/images/logo-white.png" alt="">
                </div>
                <div class="section-head ps-0">
                    <h2>ایجاد حساب کاربری رایگان</h2>
                    <p>برای ادامه، حساب کاربری ایجاد کنید!</p>
                </div>
                <div class="account-area">
                    <form>
                        <div class="mb-3">
                            <label class="form-label" for="name">نام کاربری</label>
                            <input type="text" id="name" class="form-control"
                                placeholder="نام کاربری خود را اینجا وارد کنید">
                        </div>
                        <div>
                            <label class="form-label" for="password">رمز عبور</label>
                            <div class="mb-3 input-group input-group-icon">
                                <input type="password" id="password" class="form-control dz-password"
                                    placeholder="رمز عبور خود را اینجا وارد کنید">
                                <span class="input-group-text show-pass">
                                    <i class="icon feather icon-eye-off eye-close"></i>
                                    <i class="icon feather icon-eye eye-open"></i>
                                </span>
                            </div>
                        </div>
                        <div>
                            <label class="form-label" for="confirm_password">تأیید رمز عبور</label>
                            <div class="mb-3 input-group input-group-icon">
                                <input type="password" id="confirm_password" class="form-control dz-password"
                                    placeholder="تأیید رمز عبور">
                                <span class="input-group-text show-pass">
                                    <i class="icon feather icon-eye-off eye-close"></i>
                                    <i class="icon feather icon-eye eye-open"></i>
                                </span>
                            </div>
                        </div>
                        <a href="login.html" class="btn mb-3 btn-primary w-100">ثبت نام</a>
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" value="" id="Checked-1">
                            <label class="form-check-label" for="Checked-1">با تمام شرایط، سیاست‌های حریم خصوصی و هزینه‌ها
                                موافقم</label>
                        </div>
                        <div class="text-center text-dark mb-2">
                            <span>قبلاً حساب کاربری دارید؟</span>
                        </div>
                        <a href="login.html" class="btn btn-outline-primary w-100">ادامه با ایمیل</a>
                    </form>
                    <div class="text-center p-tb20">
                        <span class="saprate">یا با استفاده از</span>
                    </div>
                    <div class="social-btn-group text-center">
                        <a href="https://www.google.com/" target="_blank" class="social-btn">
                            <img src="assets/images/icons/google.png" alt="تصویر اجتماعی">
                        </a>
                        <a href="https://www.facebook.com/" target="_blank" class="social-btn ms-3">
                            <img src="assets/images/icons/facebook.png" alt="تصویر اجتماعی">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
