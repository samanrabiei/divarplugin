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
                            <th scope="col " class="text-center">شماره</th>
                            <th scope="col" class="text-center">موجودی</th>
                            <th scope="col" class="text-center">دسترسی</th>
                            <th scope="col" class="text-center">وضعیت</th>
                            <th scope="col" class="text-center">اقدام</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($customers as $customer)
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
                                <td>{{ $customer->phone }} </td>

                                <td> {{ number_format($customer->wallet->balance) }} تومان</td>
                                <td>
                                    @if ($customer->role_id == 2)
                                        مشتری
                                    @else
                                        مدیر
                                    @endif
                                </td>
                                <td class="text-center">
                                    <span
                                        class="bg-success-focus text-success-600 border border-success-main px-24 py-4 radius-4 fw-medium text-sm">فعال
                                </td>
                                <td class="text-center">
                                    <div class="d-flex align-items-center gap-10 justify-content-center">
                                        <a href="{{ route('customers.show', $customer->id) }}">
                                            <button type="button"
                                                class="bg-info-focus bg-hover-info-200 text-info-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                                <iconify-icon icon="majesticons:eye-line"
                                                    class="icon text-xl"></iconify-icon>
                                            </button>
                                        </a>

                                        <button type="button"
                                            class="remove-item-btn bg-danger-focus bg-hover-danger-200 text-danger-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                            <iconify-icon icon="fluent:delete-24-regular" class="menu-icon"></iconify-icon>
                                        </button>
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
