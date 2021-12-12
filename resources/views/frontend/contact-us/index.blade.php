@extends('frontend.layouts.master')

@section('title','Contact-us')

@push('css')
    <link rel="stylesheet" href="{{asset('Frontend/css/intlTelInput.css')}}" type="text/css"/>
    <style>
        .intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-4 input, .intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-4 input[type=text], .intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-4 input[type=tel] {
            width: 100% !important;
            flex-basis: 100%;
        }
        .intl-tel-input {
            flex-basis: 100%;
            width: 100%;
        }
    </style>
@endpush

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

@push('js')
<script src="{{asset('Frontend/js/jquery.maskedinput.js')}}"></script>
<script src="{{asset('Frontend/js/intlTelInput.js')}}"></script>
<script src="{{asset('Frontend/js/jquery.validate.js')}}"></script>
<script src="{{asset('Frontend/js/additional-methods.min.js')}}"></script>
@include('frontend.home.Section.contact_no_scripts')
<script>
    $(document).ready(function () {
        $('#feedback-form').validate({
            rules: {
                'name': "required",
                'phone': "required",
                'email':{
                    required: true,
                    email: true
                },
                'message':{
                    required: true,
                },
                'subject':{
                    required: true,
                },
            },
        });
    });

</script>
@endpush
