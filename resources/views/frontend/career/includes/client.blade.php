@if(isset($data['client']))
<section class="service-block pad-tb bg-gradient7">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="common-heading ptag">
                    <span>{{ $_settings['client_title'] ?? 'Insert Client Title' }}</span>
                    <h2 class="mb30">{{  $_settings['client_subtitle'] ?? 'Insert Client Subtitle'}}</h2>
                    <p class="mb30">{!! $_settings['client_description'] ?? '' !!}</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
           @foreach($data['client'] as $client)
            <div class="col-lg-4 col-sm-6 mt30  wow fadeIn" data-wow-delay=".2s">
                <div class="s-block wide-sblock">
                    <div class="s-card-icon">
                        <img src="{{ \App\Facades\ViewHelperFacade::getImagePath('clients',$client->image) }}" alt="service" class="img-fluid">
                    </div>
                    <div class="s-block-content">
                        <h4>{{ $client->title }}</h4>
                      {!! str_limit($client->description , 50) !!}
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
@endif