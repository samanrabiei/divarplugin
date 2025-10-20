@extends('layout.master')

@section('content')
    <div class="continer m-4">
        <form action="{{ route('formlogin') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">آدرس ایمیل</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div class="form-text">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">رمز عبور</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                <div class="form-text">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="gavanin" id="exampleCheck1"
                    {{ old('gavanin') ? 'checked' : '' }}>
                <label class="form-check-label" for="exampleCheck1">قوانین و مقررات </label>
                <div class="form-text text-danger">
                    @error('gavanin')
                        {{ $message }}
                    @enderror
                    <span><a href="{{ route('password.reset') }}">فراموشی رمز عبور</a></span>
                </div>
            </div>
            <button type="submit" class="btn btn-success">ثبت</button>
        </form>
    </div>
@endsection
