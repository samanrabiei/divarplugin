@extends('admin.layout.layout')

@php
    $title = 'ایجاد قالب';
    $subTitle = 'ایجاد قالب دیوار';
@endphp

@section('content')
    <div class="dashboard-main-body">

        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">ویرایش قالب پیامک</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        داشبورد
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">ویرایش قالب</li>
            </ul>
        </div>

        <div class="row gy-4">
            <div class="col-lg-12">
                <div class="card mt-24">
                    <div class="card-header border-bottom">
                        <h6 class="text-xl mb-0">ویرایش برگه</h6>
                    </div>

                    <div class="card-body p-24">
                        <form method="POST"
                            action="{{ isset($smsTemplate) ? route('sms-templates.store', $smsTemplate) : route('sms-templates.store') }}"
                            id="pageForm" class="d-flex flex-column gap-20">
                            @csrf
                            @isset($smsTemplate)
                                @method('PUT')
                            @endisset

                            <!-- عنوان برگه -->
                            <div>
                                <label class="form-label fw-bold text-neutral-900" for="title">عنوان قالب:</label>
                                <input type="text" name="title" id="title"
                                    value="{{ old('title', $smsTemplate->title ?? '') }}"
                                    class="form-control border border-neutral-200 radius-8" placeholder=" ">
                                @error('title')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- اسلاگ -->
                            <div>
                                <label class="form-label fw-bold text-neutral-900" for="key">کلید:</label>
                                <input type="text" name="key" id="key"
                                    value="{{ old('key', $smsTemplate->key ?? '') }}"
                                    class="form-control border border-neutral-200 radius-8" placeholder=" ">
                                @error('key')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- وضعیت -->
                            <div>
                                <label class="form-label fw-bold text-neutral-900">نوع پیام :</label>
                                <select name="type" class="form-control border border-neutral-200 radius-8">
                                    <option value="divar" @selected(old('divar', $smsTemplate->type ?? 'divar') == 'divar')>دیوار</option>
                                    <option value="sms" @selected(old('sms', $smsTemplate->type ?? 'sms') == 'sms')>پیامک</option>
                                </select>
                                @error('type')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- ویرایشگر -->
                            <div>
                                <label class="form-label fw-bold text-neutral-900">توضیحات برگه:</label>
                                <textarea name="content_theme" class="form-control" rows="4" cols="50" placeholder="">{{ old('content_theme', $smsTemplate->content ?? '') }}</textarea>
                                @error('content_theme')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>


                            <!-- وضعیت -->
                            <div>
                                <label class="form-label fw-bold text-neutral-900">وضعیت:</label>
                                <select name="is_active" class="form-control border border-neutral-200 radius-8">
                                    <option value="1" @selected(old('is_active', $smsTemplate->is_active ?? 1) == 1)>منتشر شده</option>
                                    <option value="0" @selected(old('is_active', $smsTemplate->is_active ?? 0) == 0)>پیش‌نویس</option>
                                </select>
                                @error('is_active')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary-600 radius-8">به روزرسانی</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
