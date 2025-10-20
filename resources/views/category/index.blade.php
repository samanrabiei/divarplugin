@extends('layout.master')


@section('content')
    <ul class="list-group list-group-flush">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ردیف</th>
                    <th scope="col">عنوان</th>

                    <th scope="col">{{ __('action', ['name' => 'ali']) }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $index => $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <th scope="row">{{ $category->title }}</th>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i>حذف</button>
                                </form>

                                <a class="mr-2" href="{{ route('category.edit', $category->id) }}">
                                    <button type="button" class="btn btn-warning mr-2"><i
                                            class="bi bi-pencil-square"></i>ویرایش</button>
                                </a>
                                <button type="button" class="btn btn-success"><i class="bi bi-eye"></i> مشاهده
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $categories->links('layout.paginate') }}
    </ul>
@endsection
