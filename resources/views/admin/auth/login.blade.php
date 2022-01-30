<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Neputer | Admin Panel</title>

    <meta name="description" content="User login page"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- basic styles -->

    <link href="{{ ViewHelper::getAssetPath('bootstrap.min.css', 'css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ ViewHelper::getAssetPath('font-awesome.min.css', 'css') }}"/>

    <!--[if IE 7]>
    <link rel="stylesheet" href="{{ ViewHelper::getAssetPath('font-awesome-ie7.min.css', 'css')}}"/>
    <![endif]-->

    <!-- page specific plugin styles -->

    <!-- fonts -->

    <link rel="stylesheet" href="{{ ViewHelper::getAssetPath('ace-fonts.css', 'css') }}"/>

    <!-- ace styles -->

    <link rel="stylesheet" href="{{ViewHelper::getAssetPath('ace.min.css', 'css') }}"/>
    <link rel="stylesheet" href="{{ViewHelper::getAssetPath('ace-rtl.min.css', 'css') }}"/>

    <!--[if lte IE 8]>
    <link rel="stylesheet" href="{{ViewHelper::getAssetPath('ace-ie.min.css', 'css') }}"/>
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <script src="{{ ViewHelper::getAssetPath('html5shiv.js', 'js') }}"></script>
    <script src="{{ ViewHelper::getAssetPath('respond.min.js', 'js')}}"></script>
    <![endif]-->

    <style>
        .error{
            color: red;
            font-size:12px;
        }
    </style>
</head>

<body class="login-layout">
<div class="main-container">
    <div class="main-content">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="login-container">
                    <div class="center">
                        <h1>
                            <div class="logo-pre">
                                <img style="width:200px;" src="
{{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration', \Foundation\Lib\Meta::get('logo')) }}" alt="Logo" class="img-fluid" /></div>
                        </h1>
                    </div>

                    <div class="space-6"></div>

                    <div class="position-relative">
                        <div id="login-box" class="login-box visible widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header blue lighter bigger">
                                        <i class="icon-coffee green"></i>
                                        Please Enter Your Information
                                    </h4>

                                    <div class="space-6"></div>

                                    <form method="post" action="{{ route('admin.login') }}">
                                        @csrf
                                        <fieldset>
                                            <label class="block clearfix">
                                                <span class="block input-icon input-icon-right">
                                                    <input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email"/>
													<i class="icon-user"></i>
												</span>

                                                @if ($errors->has('email'))
                                                    <span class="error">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif

                                            </label>

                                            <label class="block clearfix">
                                                <span class="block input-icon input-icon-right">
                                                    <input type="password" name="password" class="form-control" placeholder="Password"/>
                                                    <i class="icon-lock"></i>
												</span>

                                                @if ($errors->has('password'))
                                                    <span class="error">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif

                                            </label>

                                            <div class="space"></div>

                                            <div class="clearfix">
                                                <label class="inline">
                                                    <input type="checkbox" class="ace" name="remember"/>
                                                    <span class="lbl"> Remember Me</span>
                                                </label>

                                                <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                                                    <i class="icon-key"></i>
                                                    Login
                                                </button>
                                            </div>

                                            <div class="space-4"></div>
                                        </fieldset>
                                    </form>

                                </div><!-- /widget-main -->
                            </div><!-- /widget-body -->
                        </div><!-- /login-box -->
                    </div><!-- /position-relative -->
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->

<script type="text/javascript">
    window.jQuery || document.write("<script src='{{ ViewHelper::getAssetPath('jquery-2.0.3.min.js', 'js') }}'>" + "<" + "/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='{{ ViewHelper::getAssetPath('jquery-1.10.2.min.js', 'js') }}'>" + "<" + "/script>");
</script>
<![endif]-->

<script type="text/javascript">
    if ("ontouchend" in document) document.write("<script src='{{ ViewHelper::getAssetPath('jquery.mobile.custom.min.js', 'js') }}'>" + "<" + "/script>");
</script>

<!-- inline scripts related to this page -->

<script type="text/javascript">
    function show_box(id) {
        jQuery('.widget-box.visible').removeClass('visible');
        jQuery('#' + id).addClass('visible');
    }
</script>
</body>

<!-- Mirrored from 198.74.61.72/themes/preview/ace/login.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 28 Feb 2014 17:46:42 GMT -->
</html>
