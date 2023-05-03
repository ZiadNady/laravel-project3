<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @yield('title', get_setting('website_name') . ' | ' . get_setting('site_motto'))
    </title>

 <!--  css mani  -->
 <link rel="stylesheet" href="{{ asset('css/mine.css') }} ">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <!--  Bootstrap  -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }} ">
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!--  jquery  -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>


    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
</head>

<body>
    <div class="flex-center position-ref full-height">
   <!-- Header -->
   @include('home.inc.nav')
   @yield('content')
   @include('home.inc.footer')
    @yield('script')



</body>

</html>
