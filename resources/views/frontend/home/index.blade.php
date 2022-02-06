@extends('frontend.layouts.master')

@section('title', $_settings['home_page_seo_title'] ?? config('app.name'))
@section('keywords', $_settings['home_page_seo_keywords'] ?? config('app.name'))
@section('description', $_settings['home_page_seo_description'] ?? config('app.name'))

@push('css')
    <link rel="stylesheet" href="{{asset('Frontend/css/intlTelInput.css')}}" type="text/css"/>
    <style>
        #mobile-error {
            position: absolute;
            top: calc(100% + 3px);
            left: 0;
        }
        #tac-error{
            position: absolute;
            top: 32px;
            left: -3px;
            color: #fe2691;
            font-size: 14px;
        }
        .custom-checkbox{
            padding-left: 0px !important;
        }
        @media only screen and (max-width: 768px) {
            .intl-tel-input {
                flex-basis: 100%;
                width: 100%;
            }
            .custom-number-form-group{
                padding-bottom: 15px;
            }
            #mobile-error {
                padding-bottom: 15px;
            }
        }
    </style>
@endpush

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
    <script src="{{asset('Frontend/js/jquery.maskedinput.js')}}"></script>
    <script src="{{asset('Frontend/js/intlTelInput.js')}}"></script>
    <script src="{{asset('Frontend/js/jquery.validate.js')}}"></script>
    <script src="{{asset('Frontend/js/additional-methods.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.11/jquery.lazy.min.js"
            integrity="sha512-eviLb3jW7+OaVLz5N3B5F0hpluwkLb8wTXHOTy0CyNaZM5IlShxX1nEbODak/C0k9UdsrWjqIBKOFY0ELCCArw=="
            crossorigin="anonymous"></script>
    @include('frontend.home.Section.contact_no_scripts')
    @include('frontend.home.Section.common_validation')
    <script>
        $(function () {
            $('.lazy').lazy();
        })
    </script>
@endpush