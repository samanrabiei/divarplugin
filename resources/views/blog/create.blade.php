@extends('layout.master')

@section('content')
    <div class="container">
        <form action="{{ route('blog.story') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"> عنوان</label>
                <input type="text" class="form-control" id="" name="title">
                <div class="form-text">
                    @error('title')
                        {{ $message }}
                    @enderror
                </div>
                <label for="exampleInputEmail1" class="form-label"> متن</label>
                <div class="form-floating">
                    <textarea class="form-control" name="body" placeholder="Leave a comment here" id="floatingTextarea2"
                        style="height: 100px"></textarea>
                    <label for="floatingTextarea2">متن</label>
                </div>
                <div class="form-text">
                    @error('body')
                        {{ $message }}
                    @enderror
                </div>
                <label for="exampleInputEmail1" class="form-label"> دسته بندی</label>
                <select class="form-select" aria-label="Default select example" name="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>)
                    @endforeach
                </select>
                <div class="mb-3">
                    <label for="formFile" class="form-label">تصویر شاخص </label>
                    <input class="form-control" type="file" name="picture" id="formFile">
                </div>
                <div class="form-text">
                    @error('picture')
                        {{ $message }}
                    @enderror
                </div>

            </div>
    </div>

    <button type="submit" class="btn btn-primary">ثبت</button>
    </form>
    </div>
@endsection
