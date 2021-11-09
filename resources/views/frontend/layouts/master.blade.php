<!Doctype html>
<html>

    @include('frontend.layouts.header')

<body>
  @include('frontend.layouts.nav-bar')
  <div class="main">
    @include('frontend.layouts.sweetalert')
      @yield('content')
  </div>


@include('frontend.layouts.footer')

@include('frontend.layouts.script')

</body>

</html>