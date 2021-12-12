@if(isset($data['about-us']))

    <section class="about-agency pad-tb">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 v-center">
                    <div class="image-block">
                        <img src="{{ asset('Frontend/images/about/about-image.png') }}" alt="about"
                             class="img-fluid no-shadow lazy" >
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="common-heading text-l">
                        <span> {{  $_settings['about_title'] ?? 'Insert About Title' }}</span>
                        <h2>{{  $_settings['about_subtitle'] ?? 'Insert About Subtitle' }}</h2>
                        <p>
                            {!! $data['about-us']->description !!}
                        </p>
                        <p class="quote"> {{ $_settings['about_quote'] }} </p>
                        <div class="user- mt30">
                            <div class="media">
                                <div class="user-image bdr-radius"><img
                                            src="{{ asset('Frontend/images/user-thumb/madan-adhikari.jpg') }}" alt="girl"
                                            class="img-fluid lazy" ></div>
                                <div class="media-body user-info v-center">
                                    <h5>Madan Adhikari</h5>
                                    <p>Founder of <span>{{ $_settings['company'] }}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif