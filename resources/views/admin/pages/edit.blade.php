@extends('admin.layout.layout')

@php
    $title = 'ویرایش برگه';
    $subTitle = 'ویرایش برگه';
@endphp

@section('content')
    <div class="dashboard-main-body">

        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">ویرایش برگه</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        داشبورد
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">ویرایش برگه</li>
            </ul>
        </div>

        <div class="row gy-4">
            <div class="col-lg-12">
                <div class="card mt-24">
                    <div class="card-header border-bottom">
                        <h6 class="text-xl mb-0">ویرایش برگه</h6>
                    </div>

                    <div class="card-body p-24">
                        <form action="{{ route('pages.update', $page) }}" method="POST" id="pageForm"
                            class="d-flex flex-column gap-20">
                            @csrf
                            @method('PUT')

                            <!-- عنوان برگه -->
                            <div>
                                <label class="form-label fw-bold text-neutral-900" for="title">عنوان برگه:</label>
                                <input type="text" name="title" id="title" value="{{ $page->title }}"
                                    class="form-control border border-neutral-200 radius-8" placeholder=" ">
                            </div>

                            <!-- اسلاگ -->
                            <div>
                                <label class="form-label fw-bold text-neutral-900" for="slug">اسلاگ:</label>
                                <input type="text" name="slug" id="slug" value="{{ $page->slug }}"
                                    class="form-control border border-neutral-200 radius-8" placeholder=" ">
                            </div>

                            <!-- وضعیت -->
                            <div>
                                <label class="form-label fw-bold text-neutral-900">وضعیت:</label>
                                <select name="status" class="form-control border border-neutral-200 radius-8">
                                    <option value="1" @selected($page->status == 1)>منتشر شده</option>
                                    <option value="0" @selected($page->status == 0)>پیش‌نویس</option>
                                </select>
                            </div>

                            <!-- ویرایشگر -->
                            <div>
                                <label class="form-label fw-bold text-neutral-900">توضیحات برگه:</label>
                                <div class="border border-neutral-200 radius-8 overflow-hidden">
                                    <div class="height-200">

                                        <!-- Toolbar -->
                                        <div id="toolbar-container">
                                            <span class="ql-formats">
                                                <select class="ql-font"></select>
                                                <select class="ql-size"></select>
                                            </span>
                                            <span class="ql-formats">
                                                <button class="ql-bold"></button>
                                                <button class="ql-italic"></button>
                                                <button class="ql-underline"></button>
                                                <button class="ql-strike"></button>
                                            </span>
                                            <span class="ql-formats">
                                                <select class="ql-color"></select>
                                                <select class="ql-background"></select>
                                            </span>
                                            <span class="ql-formats">
                                                <button class="ql-script" value="sub"></button>
                                                <button class="ql-script" value="super"></button>
                                            </span>
                                            <span class="ql-formats">
                                                <button class="ql-header" value="1"></button>
                                                <button class="ql-header" value="2"></button>
                                                <button class="ql-blockquote"></button>
                                                <button class="ql-code-block"></button>
                                            </span>
                                            <span class="ql-formats">
                                                <button class="ql-list" value="ordered"></button>
                                                <button class="ql-list" value="bullet"></button>
                                                <button class="ql-indent" value="-1"></button>
                                                <button class="ql-indent" value="+1"></button>
                                            </span>
                                            <span class="ql-formats">
                                                <button class="ql-direction" value="rtl"></button>
                                                <select class="ql-align"></select>
                                            </span>
                                            <span class="ql-formats">
                                                <button class="ql-link"></button>
                                                <button class="ql-image"></button>
                                                <button class="ql-video"></button>
                                                <button class="ql-formula"></button>
                                            </span>
                                            <span class="ql-formats">
                                                <button class="ql-clean"></button>
                                            </span>
                                        </div>

                                        <!-- Editor -->
                                        <div id="editor">
                                            {!! $page->content !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- hidden input برای ارسال محتوا -->
                            <input type="hidden" name="content" id="content">

                            <button type="submit" class="btn btn-primary-600 radius-8">به روزرسانی</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @push('scripts')
        <script src="{{ asset('admin/assets/js/editor.highlighted.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/editor.quill.js') }}"></script>
        <script src="{{ asset('admin/assets/js/editor.katex.min.js') }}"></script>

        <script>
            // Quill editor
            const quill = new Quill('#editor', {
                modules: {
                    syntax: true,
                    toolbar: '#toolbar-container'
                },
                placeholder: 'متن خود را وارد کنید...',
                theme: 'snow'
            });

            // مقدار اولیه hidden input هنگام submit
            document.getElementById('pageForm').addEventListener('submit', function() {
                document.getElementById('content').value = quill.root.innerHTML;
            });

            // اسلاگ اتوماتیک از title
            document.getElementById('title').addEventListener('keyup', function() {
                document.getElementById('slug').value =
                    this.value
                    .toLowerCase()
                    .replace(/ /g, '-')
                    .replace(/[^\w-]+/g, '');
            });
        </script>
    @endpush
@endsection
