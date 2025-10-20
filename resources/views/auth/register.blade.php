@extends('layout.master')

@section('content')
    <div class="continer m-5">
        <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">نام کاربری</label>
                <input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}">
                <div class="form-text text-danger">
                    @error('username')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">آدرس ایمیل</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                <div class="form-text text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">رمز عبور</label>
                <input type="password" name="password" class="form-control">
                <div class="form-text text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">تکرار رمز عبور</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="gavanin" id="exampleCheck1"
                    {{ old('gavanin') ? 'checked' : '' }}>
                <label class="form-check-label" for="exampleCheck1">قوانین و مقررات </label>
                <div class="form-text text-danger">
                    @error('gavanin')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-success">ثبت</button>
        </form>
    </div>
@endsection
