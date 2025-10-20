@extends('layout.master')

@section('content')
    <div class="continer">
        <img src="{{ asset('app/public/images/' . $blog->image) }}" width="400px" alt="">
        <p>{{ $blog->title }}</p>
        <p>{{ $blog->body }}</p>
        <p>{{ $blog->status ? 'منتشر شده' : 'پیش نویس' }}
        </p>
        <p>{{ $blog->category->title }}</p>
    </div>
@endsection
