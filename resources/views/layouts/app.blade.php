<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') Warehouse</title>

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/style.css') }}">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/daterange_picker.css') }}"/>
    @stack('css')
</head>

<body class="light">
<div id="app">
    @if(url()->current() != route('login') && url()->current() != route('register'))
        @include('partials.sidebar')
        <div class="page has-sidebar-left">
            @include('partials.navbar')
            @yield('content')
        </div>
    @else
        @yield('content')
    @endif
</div>

<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/backend/sweetalert.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script type="text/javascript" src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>
@stack('js')
<script>
    @include('partials.sweetalert')
</script>
</body>

</html>
