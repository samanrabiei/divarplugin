@extends('admin.layout.layout')
@php
    $title = 'Users Grid';
    $subTitle = 'Users Grid';
    $script = '<script>
        $(".remove-item-btn").on("click", function() {
            $(this).closest("tr").addClass("d-none")
        });
    </script>';
@endphp
@section('content')
    <div class="card h-100 p-0 radius-12">

        <div class="card basic-data-table">
            <div class="card-header">
                <h5 class="card-title mb-0">لیست مشتریان</h5>
            </div>
            <div class="card-body">
                <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                    <thead>
                        <tr>

                            <th scope="col">
                                <div class="d-flex align-items-center gap-10">
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input radius-4 border input-form-dark" type="checkbox"
                                            name="checkbox" id="selectAll">
                                    </div>
                                    ردیف
                                </div>
                            </th>
                            <th scope="col " class="text-center">عنوان</th>
                            <th scope="col" class="text-center">اسلاگ</th>
                            <th scope="col" class="text-center">وضعیت</th>
                            <th scope="col" class="text-center">اقدام</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($pages as $page)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-10">
                                        <div class="form-check style-check d-flex align-items-center">
                                            <input class="form-check-input radius-4 border border-neutral-400"
                                                type="checkbox" name="checkbox">
                                        </div>
                                        {{ $loop->iteration }}
                                    </div>
                                </td>
                                <td> {{ $page->title }} </td>
                                <td> {{ $page->slug }} </td>
                                <td class="text-center">
                                    @if ($page->status == 1)
                                        <span
                                            class="bg-success-focus text-success-600 border border-success-main px-24 py-4 radius-4 fw-medium text-sm">منتشر
                                            شده</span>
                                    @else
                                        <span
                                            class="bg-warning-focus text-success-600 border border-success-main px-24 py-4 radius-4 fw-medium text-sm">
                                            پیش نویس</span>

                                </td>
                        @endif
                        </td>

                        <td class="text-center">
                            <div class="d-flex align-items-center gap-10 justify-content-center">
                                <a href="{{ url('page', $page->slug) }}" target="_blank">
                                    <button type="button"
                                        class="bg-info-focus bg-hover-info-200 text-info-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                        <iconify-icon icon="majesticons:eye-line" class="icon text-xl"></iconify-icon>
                                    </button>
                                </a>

                                <a href=" {{ route('pages.edit', $page) }}">
                                    <button type="button"
                                        class="bg-info-focus bg-hover-info-200 text-info-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                        <iconify-icon icon="lucide:edit"></iconify-icon>
                                    </button>
                                </a>
                                <form action="{{ route('pages.destroy', $page) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="remove-item-btn bg-danger-focus bg-hover-danger-200 text-danger-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle"
                                        onclick="return confirm('حذف شود؟')">
                                        <iconify-icon icon="fluent:delete-24-regular" class="menu-icon"></iconify-icon>
                                    </button>
                                </form>

                            </div>
                        </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
