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
                            <th scope="col " class="">شناسه تراکنش</th>
                            <th scope="col" class="">هزینه سرویس</th>
                            <th scope="col" class="">پرداختی </th>
                            <th scope="col" class="">شناسه سرویس</th>
                            <th scope="col" class=""> مشتری</th>
                            <th scope="col" class=""> وضعیت ارسال</th>
                            <th scope="col" class="">اقدام</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($transactions as $transaction)
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
                                <td>{{ $transaction->transaction_id }}# </td>

                                <td> {{ number_format($transaction->profit) }} تومان</td>
                                <td> {{ number_format($transaction->amount) }} تومان</td>

                                <td> {{ $transaction->service_shnase }} </td>
                                <td> {{ $transaction->users->phone }} </td>
                                </td>
                                <td class="">
                                    @if ($transaction->sended == 1)
                                        <span
                                            class="bg-success-focus text-success-600 border border-success-main px-24 py-4 radius-4 fw-medium text-sm">ارسال
                                            شده
                                        @else
                                            <span
                                                class="text-xs bg-danger-100 text-danger-600 radius-4 px-10 py-2 fw-semibold">ارسال
                                                نشده
                                    @endif

                                </td>
                                <td class="text-center">
                                    <div class="d-flex align-items-center gap-10 justify-content-center">
                                        <a href=" route('customers.show', $customer->id) }}">
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
