{{-- TODO :: Slider is now working properly  --}}

@if(count($data['testimonial']) >0 )
<section class="testinomial-section pad-tb">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 v-center">
                <div class="common-heading text-l">
                    <span>{{ $_settings['client_testimonial_title'] ?? 'Client Testimonial Title' }}</span>
                    <h2>{{ $_settings['client_testimonial_subtitle'] ?? 'Client Testimonial Subtitle' }}</h2>
                </div>
            </div>
            <div class="col-lg-7">

                <div class="owl-carousel testimonial-card-a pl25">
                    @forelse($data['testimonial'] as $key => $testimonial)
                        <div class="testimonial-card">
                            <div class="t-text">
                                <p>{!! $testimonial->testimonial !!}</p>
                            </div>
                            <div class="client-thumbs mt30">
                                <div class="media v-center">
                                    <div class="user-image bdr-radius"><img src="{{ \App\Facades\ViewHelperFacade::getImagePath('testimonial',$testimonial->image)  }}" alt="girl" class="img-fluid lazy"></div>
                                    <div class="media-body user-info">
                                        <h5>{{ $testimonial->testimonial_by }}</h5>
                                        <p> {{ $testimonial->designation }} <small></small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@endisset
