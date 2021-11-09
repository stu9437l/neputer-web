@extends('frontend.layouts.master')

@section('content')

    @include('frontend.layouts.breadcrumb',[
     'page'=>'Development Process',
     'title' =>'Development Process',
     'banner'=> 'development_process_image'
]);

  @include('frontend.development-process.includes.serviceblock')

@endsection
