@extends('frontend.layouts.master')

@section('title', $_settings['service_page_seo_title'] ?? 'Our Services')
@section('keywords', $_settings['service_page_seo_keywords'] ?? 'Our Services')
@section('description', $_settings['service_page_seo_description'] ?? 'Our Services')

@section('content')

@include('frontend.layouts.breadcrumb',[
    'title'=>   $_settings['service_title'] ?? 'Our Services',
    'description'=>$_settings['service_subtitle'] ?? 'Our Services',
    'banner'=> $_settings['service_overview_image']
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


@endsection


