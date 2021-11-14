@extends('frontend.layouts.master')

@section('title', 'Homepage')

@section('content')

    <!--Start Slider -->
    @include('frontend.home.Section.slider')

    <!--Start About-->
    @include('frontend.home.Section.about')

    <!--Start Service-->
    @include('frontend.home.Section.service')

    <!--Start Counter-->
    @include('frontend.home.Section.counter')

    <!--Start Our Work-->
    @include('frontend.home.Section.our-work')

    <!--Start Clients-->
    @include('frontend.home.Section.client')

    <!--Start Our Industries we work for-->
    @include('frontend.home.Section.industries-we-work-for')

    <!--Start Client Testimonial-->
    @include('frontend.home.Section.client-testimonial')

    <!--Start Contact Now-->
    @include('frontend.home.Section.contact-now')

    <!--End Location-->
    
@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.11/jquery.lazy.min.js"
            integrity="sha512-eviLb3jW7+OaVLz5N3B5F0hpluwkLb8wTXHOTy0CyNaZM5IlShxX1nEbODak/C0k9UdsrWjqIBKOFY0ELCCArw=="
            crossorigin="anonymous"></script>    @include('admin.include.formValidation')
    <script>
        $(function () {
            $('.lazy').lazy();
        })
    </script>
@endpush