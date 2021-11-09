@if(isset($data['client-review']) > 0)
<section class="reviews-block pad-tb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="common-heading ptag">
                    <span>Reviews</span>
                    <h2>Client Testimonials</h2>
                    <p class="mb30">Check our customers success stories.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($data['client-review']  as $client_review)
            <div class="col-md-4 mt30">
                <div class="reviews-card pr-shadow">
                    <div class="row v-center">
                        <div class="col"> <span class="revbx-lr"><i class="fas fa-quote-left"></i></span> </div>
{{--                        <div class="col"> <span class="revbx-rl"><img src="{{ asset('Frontend/images/client/upwork-logo.png') }}" alt="review service logo"></span> </div>--}}
                    </div>
                    <div class="review-text">
                      <p>{!! $client_review->testimonial !!}</p>
                    </div>
                    <div class="-client-details-">
                        <div class="-reviewr">
                            <img src="{{ \App\Facades\ViewHelperFacade::getImagePath('testimonial',$client_review->image) }}" alt="Good Review" class="img-fluid">
                        </div>
                        <div class="reviewer-text">
                            <h4>{{ $client_review->testimonial_by }}</h4>
                            <p>{{ $client_review->designation }}, <small>{{ $client_review->address }}</small></p>
                            <div class="star-rate">
                                <ul>
                                    <li> <a href="javascript:void(0)" class="chked"><i class="fas fa-star" aria-hidden="true"></i></a> </li>
                                    <li> <a href="javascript:void(0)" class="chked"><i class="fas fa-star" aria-hidden="true"></i></a> </li>
                                    <li> <a href="javascript:void(0)" class="chked"><i class="fas fa-star" aria-hidden="true"></i></a> </li>
                                    <li> <a href="javascript:void(0)" class="chked"><i class="fas fa-star" aria-hidden="true"></i></a> </li>
                                    <li> <a href="javascript:void(0)" ><i class="fas fa-star" aria-hidden="true"></i></a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif