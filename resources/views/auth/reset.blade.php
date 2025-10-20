@extends('layout.master')

@section('content')
    <div class="continer m-5">
        <form action="{{ route('password.resetpost') }}" method="post" enctype="multipart/form-data">
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



            <button type="submit" class="btn btn-success">ثبت</button>
        </form>
    </div>
@endsection
