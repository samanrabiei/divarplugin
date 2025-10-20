@extends('layout.master')

@section('content')
    <div class="container">
        <form action="{{ route('category.story') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">دسته بندی</label>
                <input type="text" class="form-control" id="" name="title">
                <div id="emailHelp" class="form-text">
                    @error('title')
                        {{ $message }}
                    @enderror
                </div>


            </div>
    </div>

    <button type="submit" class="btn btn-primary">ثبت</button>
    </form>
    </div>
@endsection
