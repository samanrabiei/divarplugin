@extends('layout.master')

@section('content')
    <div class="container">
        <form action="{{ route('category.update', ['category' => $category->id] }}" method="post">
            @csrf

            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">دسته بندی</label>
                <input type="text" class="form-control" id="" value="{{ $category->title }}" name="title">
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
