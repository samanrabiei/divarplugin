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
        <div
            class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
            <div class="d-flex align-items-center flex-wrap gap-3">
                <span class="text-md fw-medium text-secondary-light mb-0">نمایش</span>
                <select class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                </select>
                <form class="navbar-search">
                    <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Search">
                    <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                </form>
                <select class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px">
                    <option>وضعیت ها</option>
                    <option>فعال</option>
                    <option>غیرفعال</option>
                </select>
            </div>
            <a href="route('addUser') }}"
                class="btn btn-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
                <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                افزودن مشتری جدید
            </a>
        </div>
        <div class="card-body p-24">
            <div class="table-responsive scroll-sm">
                <table class="table bordered-table sm-table mb-0">
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
            {{ $customers->links('vendor.pagination.custom') }}
        </div>
    </div>
@endsection
