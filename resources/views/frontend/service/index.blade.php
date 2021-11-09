@extends('frontend.layouts.master')

@section('content')

@include('frontend.layouts.breadcrumb',[
    'title'=>   $_settings['service_banner_subtitle'] ?? 'Insert Banner Title',
    'description'=>$_settings['service_banner_subtitle'] ?? 'Insert Banner Title',
    'banner'=>'service_image'
])
    <!--End Hero-->
    <!--Start About-->
    <section class="service pad-tb">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="image-block upset bg-shape wow fadeIn">
                     <img src="@if(isset($_settings['service_overview_image'])){{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$_settings['service_overview_image']) }} @endif" alt="Logo" class="img-fluid" />
                    </div>
                </div>
                <div class="col-lg-8 block-1">
                    <div class="common-heading text-l pl25">
                        <span>{{ $_settings['overview_title'] ?? 'Overview Title' }}</span>
                        <h2>{{ $_settings['overview_subtitle'] ?? 'Overview Subtitle' }}</h2>
                         {!! $_settings['overview_description'] ?? 'Overview Description' !!}
                        </div>
                </div>
            </div>
        </div>
    </section>
    <!--End About-->

    <!--Start Service-->
    <section class="service-block bg-gradient6 pad-tb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="common-heading ptag">
                        <span>{{ $_settings['service_title'] ?? 'Enter Service Title' }}</span>
                        <h2>{{ $_settings['service_subtitle'] ?? 'Enter Service Subtitle' }}</h2>
                        <p class="mb30">
                          {!! $_settings['service_page_description'] ?? 'Enter Service Description' !!}
                        </p> </div>
                </div>
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
                    <a href="#" class="btn-main bg-btn2 lnk">Hire Now<i class="fas fa-chevron-right fa-icon"></i><span class="circle"></span></a>
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
                        <a href="javascript:void(0)" class="btn-outline">Estimate Project <i class="fas fa-chevron-right fa-icon"></i></a>
                        <p class="cta-call">Or call us now <a href="tel:+1234567890"><i class="fas fa-phone-alt"></i> (123) 456 7890</a></p>
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


