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
    <link rel="stylesheet" href="{{ asset('assets/css/main.css?v=1.17') }}">
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
<script>
    const toasts = new Toasts({
        width: 300,
        timing: 'ease',
        duration: '.5s',
        dimOld: false,
        position: 'top-right' // top-left | top-center | top-right | bottom-left | bottom-center | bottom-right
    });

    toasts.push({
        title: 'Dark Toast',
        content: 'Click me to visit CodeShack!',
        style: 'dark',
        closeButton: false,
        link: 'https://codeshack.io',
        linkTarget: '_blank',
        onOpen: toast => {
            console.log(toast);
        },
        onClose: toast => {
            console.log(toast);
        }
    });

    toasts.push({
        title: 'Success Toast',
        content: 'My notification description.',
        style: 'success'
    });

    toasts.push({
        title: 'Verified Toast',
        content: 'My notification description.',
        style: 'verified'
    });

    toasts.push({
        title: 'Error Toast',
        content: 'My notification description.',
        style: 'error'
    });

    toasts.push({
        title: 'Toast',
        content: 'My notification description.'
    });

    // Press SPACE to add a custom toast
    window.onkeyup = event => {
        if (event.key == ' ') {
            toasts.push({
                title: 'Custom ' + (toasts.numToasts + 1),
                content: 'Custom description ' + (toasts.numToasts + 1) + '.'
            });
        }
    };
</script>
<!-- material-scrolltop button -->
<button class="material-scrolltop" type="button"></button>
<!-- ::::::::::::::All Javascripts Files here ::::::::::::::-->
<!-- Vendor JS Files -->
<script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('assets/js/modernizr-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>

<!-- Plugins JS Files -->
<script src="{{ asset('assets/js/Toasts.js') }}"></script>
<script src="{{ asset('assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('assets/js/material-scrolltop.js') }}"></script>
<script src="{{ asset('assets/js/price_range_script.js') }}"></script>
<script src="{{ asset('assets/js/in-number.js') }}"></script>
<script src="{{ asset('assets/js/jquery.elevateZoom-3.0.8.min.js') }}"></script>
<script src="{{ asset('assets/js/venobox.min.js') }}"></script>

<!-- Main js file that contents all jQuery plugins activation. -->
<script src="{{ asset('assets/js/main.js?v=1.8') }}"></script>
</body>

</html>
