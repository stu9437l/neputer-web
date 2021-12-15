@if($data['slider'])
    {{ debugbar()->log($data['slider']->toArray()) }}
    <section class="hero-section hero-bg-bg1 bg-gradient">
        <div class="text-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 v-center">
                        <div class="header-heading">
                            <h1 class="wow fadeInUp" data-wow-delay=".2s"
                                style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">{{ $data['slider']->caption  }}</h1>
                            <p class="wow fadeInUp" data-wow-delay=".4s"
                               style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                                {!! $data['slider']->alt_text !!}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 v-center">
                        <div class="single-image wow fadeIn" data-wow-delay=".5s"
                             style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
                            <img src="{{ $data['slider']->getImage() }}" alt="{{ $data['slider']->caption_two }}"
                                 class="img-fluid lazy">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
