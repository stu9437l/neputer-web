
<head>
    <meta charset="utf-8"/>
    <title>@yield('title')</title>
    <meta name="description" content="Neputer">
    <meta name="keywords" content="Neputer.com, neputer, Neputer, Software Company Nepal">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#2e2a8f">
    <!--website-favicon-->
    <link href="{{asset('Frontend/images/favicon.png')}}" rel="icon">
    <!--plugin-css-->
    <link href="{{ asset('Frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('Frontend/css/plugin.min.css')}}" rel="stylesheet">
{{--    <link href="../../../cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">--}}
{{--    <link href="../../../fonts.googleapis.com/css2e8bd.css?family=Open+Sans:wght@400;600;700&amp;family=Poppins:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">--}}
{{--    <!-- template-style-->--}}
    <link href="{{asset('Frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('Frontend/css/responsive.css')}}" rel="stylesheet">

    @stack('css')
</head>