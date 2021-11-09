<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- basic styles -->

    <link href="{{ asset('assets/panel/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/panel/css/datepicker.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('assets/panel/css/font-awesome.min.css')}}" />

    <!--[if IE 7]>
    <link rel="stylesheet" href="{{ asset('assets/panel/css/font-awesome-ie7.min.css')}}" />
    <![endif]-->

    <!-- page specific plugin styles -->

    <!-- fonts -->

    <link rel="stylesheet" href="{{ asset('assets/panel/css/ace-fonts.css') }}" />

    <!-- ace styles -->

    <link rel="stylesheet" href="{{ asset('assets/panel/css/ace.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/panel/css/ace-rtl.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/panel/css/ace-skins.min.css') }}" />

    <!--[if lte IE 8]>
    <link rel="stylesheet" href="{{ asset('assets/panel/css/ace-ie.min.css')}}" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->

    <script src="{{ asset('assets/panel/js/ace-extra.min.js') }}"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <script src="{{asset('assets/panel/js/html5shiv.js')}}"></script>
    <script src="{{asset('assets/panel/js/respond.min.js')}}"></script>
    <![endif]-->
    <style>
        .form-group.required .control-label:after {
            content:" *";
            color:red;
        }

        .error{
            color:indianred;
        }
        .has-error{
            color:indianred;
        }
    </style>
    @yield('css')
    @stack('css')
</head>