<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title -->
    <title>اعتمادینو – سامانه یکپارچه احراز هویت، خدمات بانکی و استعلامات</title>

    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">
    <meta name="theme-color" content="#FE4487">
    <meta name="author" content="DexignZone">
    <meta name="robots" content="index, follow">
    <meta name="keywords"
        content="اندروید, iOS, موبایل, قالب اپلیکیشن, اپلیکیشن وب پیشرفته, کیت UI, رنگ‌های متعدد, طراحی تاریک">
    <meta name="description"
        content="فروشگاه آنلاین خود را با قالب اپلیکیشن تجارت الکترونیک ما متحول کنید. خرید بی‌دردسر، پرداخت‌های امن و توصیه‌های شخصی‌سازی شده برای یک تجربه کاربری استثنائی">
    <meta property="og:title" content="ویدو - قالب اپلیکیشن موبایل تجارت الکترونیک (Bootstrap + PWA)">
    <meta property="og:description"
        content="فروشگاه آنلاین خود را با قالب اپلیکیشن تجارت الکترونیک ما متحول کنید. خرید بی‌دردسر، پرداخت‌های امن و توصیه‌های شخصی‌سازی شده برای یک تجربه کاربری استثنائی.">
    <meta property="og:image" content="https://wedo.dexignzone.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">
    <!-- Favicons Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">


    <!-- Global CSS -->
    <link href="{{ asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">

    <!-- Stylesheets -->
    <link rel="stylesheet" class="main-css" type="text/css" href="{{ asset('assets/css/style-rtl.css') }}">

    {{-- toast --}}
    <link rel="stylesheet" href="{{ asset('assets/toast/style.css') }}">
    {{-- palak --}}
    <link rel="stylesheet" href="{{ asset('assets/palak/style.css') }}">
    <link
        href="../css2-2?family=Open+Sans:wght@300;400;500;600;700;800&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    {{-- add style with componnt --}}

    @stack('styles')

    @livewireStyles
</head>

<body>
    <div class="page-wrapper">

        <!-- Preloader -->
        <div id="preloader">
            <div class="loader">
                <div class="load-circle">
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>

        <!-- Preloader end-->
