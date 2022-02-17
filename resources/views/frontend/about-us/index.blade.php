@extends('frontend.layouts.master')

@section('title', $_settings['about_us_page_seo_title'] ?? 'About Us')
@section('keywords', $_settings['about_us_page_seo_keywords'] ?? 'About Us')
@section('description', $_settings['about_us_page_seo_description'] ?? 'About Us')

@section('content')

<!--Breadcrumb Area-->
@include('frontend.layouts.breadcrumb',[
   'title'=> 'About Company',
    'banner'=> $_settings['about_image'],
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

