@if(count($data['our-works']) > 0)
    <section class="portfolio-section pad-tb">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-8">
                    <div class="common-heading">
                        <span>Our Work</span>
                        <h2 class="mb0">Our Latest Creative Work</h2>
                    </div>
                </div>
            </div>
            @php $i = 0 @endphp
            <div class="row">
                @forelse($data['our-works'] as $our_work)
                    <div class="col-lg-4 col-sm-4 mt60 wow fadeInUp" data-wow-delay="{{ $i = $i + 0.2 }}s">
                        <div class="isotope_item hover-scale">
                            <div class="item-image" data-tilt data-tilt-max="2" data-tilt-speed="1000">
                                <a href="#"><img
                                            src="{{ \App\Facades\ViewHelperFacade::getImagePath('our-work',$our_work->images) }}"
                                            alt="image" class="img-fluid lazy"/> </a>
                            </div>
                            <div class="item-info">
                                <h4><a href="#">{{ $our_work->name }}</a></h4>
                                <p>{{ $our_work->platform }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    No data Found
                @endforelse
            </div>
        </div>
    </section>
@endif