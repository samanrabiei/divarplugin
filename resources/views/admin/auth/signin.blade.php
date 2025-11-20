<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="light" dir="rtl">

<x-admin.head />

<body>

    <section class="auth bg-base d-flex flex-wrap">
        <div class="auth-left d-lg-block d-none">
            <div class="d-flex align-items-center flex-column h-100 justify-content-center">
                <img src="{{ asset('admin/assets/images/auth/auth-img.png') }}" alt="">
            </div>
        </div>
        <div class="auth-right py-32 px-24 d-flex flex-column justify-content-center">
            <div class="max-w-464-px mx-auto w-100">
                <div>
                    <a href="" class="mb-40 max-w-290-px">
                        <img src="{{ asset('admin/assets/images/logo.png') }}" alt="">
                    </a>
                    <h4 class="mb-12">{{ __('admin.Sign In') }} </h4>
                    <p class="mb-32 text-secondary-light text-lg">خوش آمدید لطفا اطلاعات زیر را برای ورود وارد نمایید.
                    </p>
                </div>
                <form action="{{ route('formlogin') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="icon-field mb-16">
                        <span class="icon top-50 translate-middle-y">
                            <iconify-icon icon="mage:email"></iconify-icon>
                        </span>
                        <input type="email" name="email" class="form-control h-56-px bg-neutral-50 radius-12"
                            placeholder="ایمیل">
                    </div>
                    @error('email')
                        {{ $message }}
                    @enderror
                    <div class="position-relative mb-20">
                        <div class="icon-field">
                            <span class="icon top-50 translate-middle-y">
                                <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                            </span>
                            <input type="password" name="password" class="form-control h-56-px bg-neutral-50 radius-12"
                                id="your-password" placeholder="رمز عبور">
                        </div>
                        <span
                            class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light"
                            data-toggle="#your-password"></span>
                    </div>
                    @error('password')
                        {{ $message }}
                    @enderror
                    <div class="">
                        <div class="d-flex justify-content-between gap-2">
                            <a href="{{ route('password.reset') }}" class="text-primary-600 fw-medium">رمز عبور خود را
                                فراموش کرده
                                اید؟</a>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32">
                        ورود</button>


                </form>
            </div>
        </div>
    </section>


    <x-admin.script />

</body>

</html>
