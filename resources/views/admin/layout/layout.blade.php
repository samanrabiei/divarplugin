<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="light" dir="rtl">

<x-admin.head />

<body>

    <!-- ..::  header area start ::.. -->
    <x-admin.sidebar />
    <!-- ..::  header area end ::.. -->

    <main class="dashboard-main">

        <!-- ..::  navbar start ::.. -->
        <x-admin.navbar />
        <!-- ..::  navbar end ::.. -->
        <div class="dashboard-main-body">

            <!-- ..::  breadcrumb  start ::.. -->
            <x-admin.breadcrumb title='{{ isset($title) ? $title : '' }}'
                subTitle='{{ isset($subTitle) ? $subTitle : '' }}' />
            <!-- ..::  header area end ::.. -->

            @yield('content')

        </div>
        <!-- ..::  footer  start ::.. -->
        <x-admin.footer />
        <!-- ..::  footer area end ::.. -->

    </main>
    <x-admin.script />
    <!-- ..::  scripts  start ::.. -->
    <x-admin.script script='{!! isset($script) ? $script : '' !!}' />
    <!-- ..::  scripts  end ::.. -->

</body>

</html>
