@if(count($data['services']) > 0)
    <section class="service-section web-service pad-tb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="common-heading">
                        <span>{{ $_settings['service_homepage_title'] ?? 'Insert Service Title' }}</span>
                        <h2 class="mb30">{{ $_settings['service_homepage_subtitle'] ?? 'Insert Service Subtitle' }}</h2>
                    </div>
                </div>
            </div>
            <div class="row upset link-hover shape-num justify-content-center">
                @forelse($data['services'] as $service)
                    <div class="col-lg-3 col-sm-6 mt30 shape-loc wow fadeInUp" data-wow-delay="0.02s"
                         style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="s-block" data-tilt="" data-tilt-max="5" data-tilt-speed="1000"
                             style="will-change: transform; transform: perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1);">
                            <div class="s-card-icon"><img
                                        src="{{ \App\Facades\ViewHelperFacade::getImagePath('services',$service->image) }}"
                                        alt="service" class="img-fluid lazy"></div>
                            <h4>{{ $service->title }}</h4>
                            <p> {!!  str_limit($service->description, 50)  !!}</p>
                            <p><a href="{{ route('service.show', [$service->slug]) }}"><i class="fas fa-chevron-right fa-icon"></i>Learn More</a></p>
                        </div>
                    </div>
                @empty

                @endforelse
            </div>
        @include('frontend.home.Section.hire')
        </div>
    </section>
@endif