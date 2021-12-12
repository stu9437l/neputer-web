@extends('frontend.layouts.master')

@section('title','Contact-us')

@push('css')
    <link rel="stylesheet" href="{{asset('Frontend/css/intlTelInput.css')}}" type="text/css"/>
    <style>
        #mobile-error {
            position: absolute;
            top: calc(100% + 3px);
            left: 0;
        }
        #customCheck-error{
            position: absolute;
            top: 22px;
            left: -3px;
            color: #fe2691;
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
                'customCheck': "required",
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
