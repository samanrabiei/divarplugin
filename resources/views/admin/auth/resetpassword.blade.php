<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="light" dir="rtl">

<x-admin.head />

<body>

    <section class="auth forgot-password-page bg-base d-flex flex-wrap">
        <div class="auth-left d-lg-block d-none">
            <div class="d-flex align-items-center flex-column h-100 justify-content-center"> <img
                    src="{{ asset('assets/images/auth/forgot-pass-img.png') }}" alt=""> </div>
        </div>
        <div class="auth-right py-32 px-24 d-flex flex-column justify-content-center">
            <div class="max-w-464-px mx-auto w-100">
                <div>
                    <h4 class="mb-12"> رمز عبور جدید</h4>
                    <p class="mb-32 text-secondary-light text-lg">
                        رمز عبور جدید خود را وارد نمایید.
                    </p>
                </div>
                <form action="{{ route('SubmitNewPassword') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input hidden name="token" value="{{ $token }}">
                    <div class="icon-field"> <span class="icon top-50 translate-middle-y"> <iconify-icon
                                icon="mage:email"></iconify-icon> </span>
                        <input type="password" class="form-control h-56-px bg-neutral-50 radius-12" name="password"
                            placeholder="">
                    </div>
                    </br>
                    @error('password')
                        {{ $message }}
                    @enderror
                    <div class="icon-field"> <span class="icon top-50 translate-middle-y"> <iconify-icon
                                icon="mage:email"></iconify-icon> </span>
                        <input type="password" class="form-control h-56-px bg-neutral-50 radius-12"
                            name="password_confirmation" placeholder="   ">
                    </div>
                    <button type="submit"
                        class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32">ادامه</button>
                    <div class="text-center"> <a href="" class="text-primary-600 fw-bold mt-24">بازگشت به
                            ورود</a> </div>
                    <div class="mt-120 text-center text-sm">
                        <p class="mb-0">قبلاً حساب دارید؟ <a href="{{ route('formlogin') }}"
                                class="text-primary-600 fw-semibold">وارد
                                شوید</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <x-admin.script />

</body>

</html>
