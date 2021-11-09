@extends('frontend.layouts.master')

@section('title','Request-a-quote')

@section('content')


<!--Breadcrumb Area-->
@include('frontend.layouts.breadcrumb',[
    'page'=>"Request a Quote",
    'title'=> $_settings['quotes_title'],
    'banner'=>'quote_banner_image'
])
<!--End Breadcrumb Area-->
<!--Start Enquire Form-->

@include('frontend.request-a-quote.includes.form')

@endsection
