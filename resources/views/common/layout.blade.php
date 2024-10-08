<html>

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- ::::::::::::::All CSS Files here :::::::::::::: -->

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/plaza-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">

    <!-- Plugin CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugin/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugin/material-scrolltop.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugin/price_range_style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugin/in-number.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugin/venobox.min.css') }}">

    <!-- Main Style CSS File -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css?v=1.22') }}">
</head>
<body>
<header>
    @include('common.header')
    @include('common.header_mobile')
    @include('common.offcanvas_mobile_menu')
    @include('common.offcanvas_cart')
    <div class="offcanvas-overlay"></div>
</header> <!-- ::::::  End  Header Section  ::::::  -->
@yield('breadcrumbs')
<!-- ::::::  Start  Main Container Section  ::::::  -->
<main id="main-container" class="main-container">
    <div class="container">
        @yield('main_content')
    </div>
</main> <!-- ::::::  End  Main Container Section  ::::::  -->

@include('common.footer')

<!-- material-scrolltop button -->
<button class="material-scrolltop" type="button"></button>

<!-- ::::::::::::::All Javascripts Files here ::::::::::::::-->
<script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('assets/js/modernizr-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('assets/js/Toasts.js?v=1.0') }}"></script>
<script src="{{ asset('assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('assets/js/material-scrolltop.js') }}"></script>

<script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('assets/js/price_range_script.js') }}"></script>
<script src="{{ asset('assets/js/in-number.js') }}"></script>
{{--<script src="{{ asset('assets/js/jquery.elevateZoom-3.0.8.min.js') }}"></script>--}}
<script src="{{ asset('assets/js/venobox.min.js') }}"></script>

<script src="{{ asset('assets/js/main.js?v=1.15') }}"></script>
@if ($errors->any())
    <script>
        @foreach ($errors->all() as $error)
        toasts.push({
            title: 'Ошибка',
            content: '{{ $error }}',
            style: 'error'
        });
        @endforeach
    </script>
@endif

@if (session('success'))
    <script>
        toasts.push({
            title: 'Успешно!',
            content: '{{ session('success') }}',
            @if(session('success') == "Товар добавлен в корзину!")
            link: "{{ route('cart') }}",
            @endif
            style: 'success'
        });
    </script>
@endif
@if (session('info'))
    <script>
        toasts.push({
            title: 'Инфо',
            content: '{{ session('info') }}',
            style: 'verified'
        });
    </script>
@endif
</body>
</html>
