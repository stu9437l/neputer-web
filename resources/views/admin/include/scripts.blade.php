<!-- basic scripts -->

<!--[if !IE]> -->

<script type="text/javascript">
    window.jQuery || document.write("<script src='{{ asset('assets/panel/js/jquery-2.0.3.min.js') }}'>" + "<" + "/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='{{asset('assets/panel/js/jquery-1.10.2.min.js')}}'>"+"<"+"/script>");
</script>
<![endif]-->

<script type="text/javascript">
    if ("ontouchend" in document) document.write("<script src='{{asset('assets/panel/js/jquery.mobile.custom.min.js')}}'>" + "<" + "/script>");
</script>
<script src="{{asset('assets/panel/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/panel/js/date-time/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/panel/js/typeahead-bs2.min.js')}}"></script>

<!-- page specific plugin scripts -->

@yield('js_libraries')

<!-- ace scripts -->

<script src="{{ asset('assets/panel/js/ace-elements.min.js')}}"></script>
<script src="{{ asset('assets/panel/js/ace.min.js')}}"></script>

<!-- inline scripts related to this page -->

@yield('js_scripts')
@stack('js')