@extends('frontend.layouts.master')

@section('title','Contact-us')

@section('content')

<!--Breadcrumb Area-->
@include('frontend.layouts.breadcrumb',[
    'page'=>"Contact",
    'title'=>"Contact",
    'banner'=>'contact_banner_image'
])
<!--End Breadcrumb Area-->
<!--Start Enquire Form-->

@include('frontend.contact-us.includes.form')
<!--End Enquire Form-->
<!--Start Location-->
<section class="contact-location pad-tb bglight">
    <div class="container">
      {!! $_settings['neputer_location'] ?? 'Insert Neputer Location' !!}
    </div>
</section>
<!--End Location-->
@endsection
