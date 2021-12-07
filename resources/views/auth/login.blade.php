<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bin Mongy</title>
    <link rel="stylesheet" type="text/css" href="{{asset('/dashboard/scss/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/dashboard/scss/main.css')}}">
    <link rel="shortcut icon" href="{{asset('website/imgs/logo.svg')}}" type="image/x-icon">
    <base href="{{asset('/')}}" target="_blank">
  </head>
  <body class="antialiased">

    <div id="app">
      <mainapp></mainapp>
    </div>

    <script src="{{asset('/dashboard/js/app.js')}}"></script>
</body>
</html>
