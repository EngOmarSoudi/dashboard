<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bin Mongy</title>
    <link rel="stylesheet" href="{{asset('website/scss/normalize.min.css')}}">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css'>
    <link rel='stylesheet' href="{{asset('website/scss/animate.min.css')}}">
    <link rel="shortcut icon" href="{{asset('website/imgs/logo.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('website/scss/swiper-bundle.css')}}">
    <link rel="stylesheet" href="{{asset('website/scss/swiper-bundle.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('website/scss/slide.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('website/scss/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('website/scss/main.css')}}">
    <base href="{{asset('/')}}" target="_blank">
</head>

<body class="antialiased">
    <div id="app">
        <index></index>
    </div>

    <script src="{{asset('website/js/appWebSite.js')}}"></script>
    <script src="{{asset('website/js/jquery.min.js')}}"></script>
    <script src="{{asset('website/js/slick.min.js')}}"></script>
    <script src="{{asset('website/js/slick-animation.min.js')}}"></script>
    <script src="{{asset('website/js/myapp.js')}}"></script>
</body>
</html>
