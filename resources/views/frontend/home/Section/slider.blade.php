@if(count($data['slider']) > 0)
    <section class="hero-section hero-bg-bg1 bg-gradient">
        <div class="text-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 v-center">
                        <div class="header-heading">
                            <h1 class="wow fadeInUp" data-wow-delay=".2s"
                                style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">Creative
                                Web Development Company</h1>
                            <p class="wow fadeInUp" data-wow-delay=".4s"
                               style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">Lorem ipsum
                                dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus, risus sit amet auctor
                                sodales, justo erat tempor eros.</p>
                            <a href="#" class="btn-main bg-btn lnk wow fadeInUp" data-wow-delay=".6s"
                               style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">View Case
                                Studies <i class="fas fa-chevron-right fa-icon"></i><span class="circle"></span></a>
                        </div>
                    </div>
                    <div class="col-lg-6 v-center">
                        <div class="single-image wow fadeIn" data-wow-delay=".5s"
                             style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
                            <img src="{{ asset('Frontend/images/hero/hero-image.png') }}" alt="web development"
                                 class="img-fluid lazy" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
