@extends('frontend.layouts.master')

@section('content')

<!--Breadcrumb Area-->
@include('frontend.layouts.breadcrumb',[
   'page'=>'About',
   'title'=>'About Company',
    'banner'=> 'about_image'
])

<!--End Breadcrumb Area-->
<!--Start About-->
 @include('frontend.about-us.section.about')
<!--End About-->
<!--Start why-choose-->
   @include('frontend.about-us.section.why-us')
<!--End why-choose-->
<!--Start Footer-->
@endsection

