<!doctype html>
<html class="no-js" lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="icon" href="/image/ico/favicon.ico">

    <!-- Foundation -->
    {{-- <link rel="stylesheet" href="./foundation-icons/foundation-icons.css">  --}}

    {{-- <link rel="stylesheet" href="/css/app.css"> --}}
    <link rel="stylesheet" href="/css/foundation.css">
	
    <!-- Подключение стилей -->
    {{-- <link rel="stylesheet" href="/css/reset.css"> --}}
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="/css/reset_foundation.css">
    <link rel="stylesheet" href="/css/adaptive.css">

    
  </head>
<body class="grid-x align-top">

  <script src="/js/vendor/jquery.js" type="text/javascript"></script>

    @include('blocks.bootstrap')

    @include('blocks.header')
    @include('blocks.navigation')

    @yield('main_content')

    @include('blocks.footer')


  
    <script src="/js/vendor/what-input.js" type="text/javascript"></script>
    <script src="/js/vendor/foundation.min.js" type="text/javascript"></script>
    <script src="/js/all.js" type="text/javascript"></script>
  
  </body>
</html>
