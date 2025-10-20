@extends('layout.master')

@section('content')
    <div class="continer m-5">
        <form action="{{ route('SubmitNewPassword') }}" method="post" enctype="multipart/form-data">
            @csrf

            <input hidden name="token" value="{{ $token }}">


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



            <button type="submit" class="btn btn-success">ثبت</button>
        </form>
    </div>
@endsection
