@if(count($data['clients'] )>0)
    <section class="clients-section- bg-gradient15 pad-tb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="common-heading">
                        <span>{{ $_settings['client_title'] ?? 'Insert Client Title' }}</span>
                        <h2 class="mb30">{{  $_settings['client_subtitle'] ?? 'Insert Client Subtitle'}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="clients-logos text-center col-12">
                        <ul class="row text-center clearfix">
                            @php $i = 0 @endphp
                            @forelse($data['clients'] as $client)
                                <li class="wow fadeIn" data-wow-delay="{{ $i = $i + 0.2 }}s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
                                    <div class="clients-logo"><img data-src="{{ \App\Facades\ViewHelperFacade::getImagePath('clients',$client->image) }}"
                                       title="{{ $client->title }}"
                                       src="{{ asset('Frontend/images/about/office-1.jpg') }}" alt="{{ $client->title }}" class="img-fluid lazy"></div>
                                </li>

                            @empty

                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif