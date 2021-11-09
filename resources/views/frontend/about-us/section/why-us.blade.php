@if(count($data['why-choose-us']) > 0)
<section class="why-choose pad-tb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="common-heading">
                    <span>We Are Awesome</span>
                    <h2 class="mb30">Why Choose Us</h2>
                </div>
            </div>
        </div>
        <div class="row upset">
            @forelse($data['why-choose-us'] as $why_us)
                <div class="col-lg-3 col-sm-6 mt30">
                    <div class="s-block up-hor">
                        <div class="s-card-icon"><img src="{{ \App\Facades\ViewHelperFacade::getImagePath('why-us',$why_us->images) }}" alt="service" class="img-fluid"/></div>
                        <h4>{{ $why_us->title }}</h4>
                        <p>{!! $why_us->description !!}</p>
                    </div>
                </div>
            @empty

            @endforelse
        </div>
    </div>
</section>
@endif