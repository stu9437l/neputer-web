<head>
    <meta charset="utf-8"/>
    <title>@yield('title')</title>
    <meta name="description" content="Neputer">
    <meta name="keywords" content="Neputer.com, neputer, Neputer, Software Company Nepal">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#2e2a8f">
    <link href="{{asset('Frontend/images/favicon.png')}}" rel="icon">
    <link href="{{ asset('Frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('Frontend/css/plugin.min.css')}}" rel="stylesheet">
    <link href="{{asset('Frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('Frontend/css/responsive.css')}}" rel="stylesheet">

    @stack('css')
</head>