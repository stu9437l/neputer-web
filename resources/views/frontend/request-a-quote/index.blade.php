@extends('frontend.layouts.master')

@section('title','Request-a-quote')

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


<!--Breadcrumb Area-->
@include('frontend.layouts.breadcrumb',[
    'page'=>"Request a Quote",
    'title'=> $_settings['quotes_title'] ?? 'N/A',
    'banner'=>'quote_banner_image'
])
<!--End Breadcrumb Area-->
<!--Start Enquire Form-->

@include('frontend.request-a-quote.includes.form')

@endsection

@push('js')
    <script src="{{asset('Frontend/js/jquery.maskedinput.js')}}"></script>
    <script src="{{asset('Frontend/js/intlTelInput.js')}}"></script>
    <script src="{{asset('Frontend/js/jquery.validate.js')}}"></script>
    <script src="{{asset('Frontend/js/additional-methods.min.js')}}"></script>
    @include('frontend.home.Section.contact_no_scripts')
    <script>
        $(document).ready(function () {
            $('#form-validation').validate({
                rules: {
                    'name': "required",
                    'phone': "required",
                    'tac': "required",
                    'email':{
                        required: true,
                        email: true
                    },
                    'message':{
                        required: true,
                    },
                    'service':{
                        required: true,
                    },
                },
            });
        });

    </script>

@endpush
