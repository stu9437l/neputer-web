@extends('frontend.layouts.master')

@section('title', 'Our Services')
@section('keywords', 'Our Services')
@section('description', 'Our Services')

@section('content')

@include('frontend.layouts.breadcrumb',[
    'title'=>   $_settings['service_title'] ?? 'Our Services',
    'description'=>$_settings['service_subtitle'] ?? 'Our Services',
    'banner'=>'service_image'
])

    <!--Start Service-->
    <section class="service-block bg-gradient6 pad-tb">
        <div class="container">
            <div class="row justify-content-center">
            </div>
            <div class="row upset link-hover">
                @forelse($service as $services)
                <div class="col-lg-4 col-sm-6 mt30 wow fadeInUp" data-wow-delay=".2s">
                    <div class="s-block">
                        <div class="s-card-icon"><img src="{{ ViewHelper::getImagePath(AppHelper::getFolderName('services'), $services->image) }}" alt="service" class="img-fluid"/></div>
                        <h4>{{ $services->title }}</h4>
                        <p>{!! str_limit($services->description, 100 ) !!} </p>
                        <p><a href="{{ route('service.show', [$services->slug]) }}">Read more</a></p>
                    </div>
                </div>
                @empty

                @endforelse
            </div>
            <div class="-cta-btn mt70">
                <div class="free-cta-title v-center wow zoomInDown" data-wow-delay="1.3s">
                    <p>Hire a <span>Dedicated Developer</span></p>
                    <a href="{{ url('contact-us') }}" class="btn-main bg-btn2 lnk">Hire Now<i class="fas fa-chevron-right fa-icon"></i><span class="circle"></span></a>
                </div>
            </div>
        </div>
    </section>
    <!--End Service-->

    <!--Start CTA-->
    <section class="cta-area pad-tb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="common-heading">
                        <span>Let's work together</span>
                        <h2>We Love to Listen to Your Requirements</h2>
                        <a href="{{ url('contact-us') }}" class="btn-outline">Estimate Project <i class="fas fa-chevron-right fa-icon"></i></a>
                        <p class="cta-call">Or call us now <a href="tel:{{$_settings['company_phone']}}"><i class="fas fa-phone-alt"></i> {{$_settings['company_phone']}}</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape shape-a1"><img src="{{ asset('Frontend/images/shape/shape-3.svg') }}" alt="shape"/></div>
        <div class="shape shape-a2"><img src="{{ asset('Frontend/images/shape/shape-4.svg') }}" alt="shape"/></div>
        <div class="shape shape-a3"><img src="{{ asset('Frontend/images/shape/shape-13.svg') }}" alt="shape"/></div>
        <div class="shape shape-a4"><img src="{{ asset('Frontend/images/shape/shape-11.svg') }}" alt="shape"/></div>
    </section>
    <!--End CTA-->
    <!--Start Footer-->

@endsection


