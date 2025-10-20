@extends('layout.master')


@section('content')
    <ul class="list-group list-group-flush">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ردیف</th>
                    <th scope="col">عنوان</th>
                    <th scope="col">وضعیت</th>
                    <th scope="col">دسته بندی</th>
                    <th scope="col">{{ __('action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $index => $blog)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>

                        <td>{{ $blog->title }}</td>
                        <td>
                            @if ($blog->status == 1)
                                <span class="badge bg-success">منتشر شده</span>
                            @else
                                <span class="badge bg-danger"> پیش نویس</span>
                            @endif
                        </td>
                        <td>{{ $blog->category->title }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <form action="{{ route('blog.destroy', $blog->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i>حذف</button>

                                </form>

                                <a href="{{ route('blog.edit', ['blog' => $blog->id]) }}"> <button type="button"
                                        class="btn btn-warning"><i class="bi bi-pencil-square"></i>ویرایش</button> </a>
                                <a href="{{ route('blog.show', $blog->id) }}">
                                    <button type="button" class="btn btn-success"><i class="bi bi-eye"></i> مشاهده
                                    </button>
                                </a>

                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </ul>
@endsection
