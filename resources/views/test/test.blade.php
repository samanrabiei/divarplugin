@extends('layout.master')


@section('content')
    <ul class="list-group list-group-flush">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ردیف</th>
                    <th scope="col">عنوان</th>

                    <th scope="col">432</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($data as $blog)
                    <tr>
                        <td></td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->status }}</td>


                    </tr>
                @endforeach --}}
                <td>{{ $data->title }}</td>
                <td>{{ $data->status }}</td>
            </tbody>
        </table>

    </ul>
@endsection
