  @extends('webapp_layout.master')

  @section('content')
      <form method="POST" action="{{ route('otp.verify') }}">
          @csrf
          <div class="page-content">
              <div class="account-box">
                  <div class="container">
                      <div class="logo-area">
                          <img class="logo-dark" src="assets/images/logo.png" alt="">
                          <img class="logo-light" src="assets/images/logo-white.png" alt="">
                      </div>
                      <div class="section-head text-center pt-0">
                          @if (session('status'))
                              <p style="color:green">یک کد تأیید به شماره موبایل <span class="text-lowercase"></span>
                                  {{ session('status') }}
                                  ارسال شد.
                              </p>
                          @endif
                          <h2>کد را وارد کنید</h2>

                          @error('phone')
                              <p style="color:red">{{ $message }}</p>
                          @enderror
                      </div>
                      <div class="account-area">

                          <input type="number" class="form-control" name="otp">

                      </div>
                  </div>
              </div>
          </div>
          <footer class="footer fixed">
              <div class="container">
                  <div class="seprate-box mb-3">
                      <a href="{{ route('otp.phone.form') }}" class="back-btn dz-flex-box">
                          <i class="icon feather icon-chevron-right"></i>
                      </a>
                      <button type="submit" class="btn btn-primary w-100">تایید کد</button>
                  </div>

              </div>
          </footer>
      </form>
  @endsection
