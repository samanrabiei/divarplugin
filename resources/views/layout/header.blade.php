<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-T5m5WERuXcjgzF8DAb7tRkByEZQGcpraRTinjpywg37AO96WoYN9+hrhDVoM6CaT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>bootstrap table</title>
</head>

<body>
    <div class="container">
        <header>
            <div class="px-3 py-2 bg-dark text-white">
                <div class="container">
                    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                        @if (session('error'))
                            <div class="alert alert-warning">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('message'))
                            <p> {{ session()->get('message') }} </p>
                        @endif
                        <a href="/"
                            class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                                <use xlink:href="#bootstrap"></use>
                            </svg>
                        </a>

                        <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                            @auth
                                <li>
                                    <a href="#" class="nav-link text-secondary">
                                        <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                            <use xlink:href="#home"></use>
                                        </svg>
                                        خانه
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('blog.index') }}" class="nav-link text-white">
                                        <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                            <use xlink:href="#speedometer2"></use>
                                        </svg>
                                        نوشته ها
                                        {{ $data = DB::table('blogs')->count() }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('category.index', 'fa') }}" class="nav-link text-white">
                                        <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                            <use xlink:href="#table"></use>
                                        </svg>
                                        دسته بندی ها
                                        {{ $data = DB::table('categories')->count() }}
                                    </a>
                                </li>
                            @endauth
                        </ul>
                        @auth
                            <div class="text-start">
                                <p>
                                    {{ auth()->user()->name }}
                                </p>
                            </div>

                            <div class="text-end m-2">
                                <a href="{{ route('logout') }}"> <button type="button" class="btn btn-success">
                                        خروج</button></a>

                            </div>
                        @endauth

                        @guest
                            <div class="text-start">
                                <a href="{{ route('formregister') }}">
                                    <button type="button" class="btn btn-primary">ثبت نام</button>
                                </a>
                            </div>

                            <div class="text-end m-2">
                                <a href="{{ route('login') }}"> <button type="button" class="btn btn-success">
                                        ورود</button></a>

                            </div>
                        @endguest

                    </div>
                </div>
            </div>
            <div class="px-3 py-2 border-bottom mb-3">
                <div class="container d-flex flex-wrap justify-content-center">
                    <form class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto">
                        <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                    </form>
                    {{-- @can('admin_createpost')
                        <div class="text-start">
                            <a href="{{ route('blog.create') }}">
                                <button type="button" class="btn btn-primary">ایجاد نوشته جدید</button>
                            </a>
                        </div>
                    @endcan --}}

                    @can('create', 'App\\Models\blog')
                        <div class="text-start">
                            <a href="{{ route('blog.create') }}">
                                <button type="button" class="btn btn-primary">ایجاد نوشته جدید</button>
                            </a>
                        </div>
                    @endcan
                    {{-- @if (auth()->user()->can('create', 'App\\Models\blog'))
                        <div class="text-start">
                            <a href="{{ route('blog.create') }}">
                                <button type="button" class="btn btn-primary">ایجاد نوشته جدید</button>
                            </a>
                        </div>
                    @endif --}}

                </div>
                <div class="text-end mr-2">
                    <a href="{{ route('category.create') }}"> <button type="button" class="btn btn-success">ایجاد
                            دسته بندی جدید</button></a>

                </div>
            </div>
    </div>

    </header>
