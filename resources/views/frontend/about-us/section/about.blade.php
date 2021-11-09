@if(isset($data['about-us']))
<section class="about-agency pad-tb block-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 v-center">
                <div class="about-image">
                    <img src="{{asset('Frontend/images/about/company-about.png')}}" alt="about us" class="img-fluid"/>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="common-heading text-l ">
                    <span>About Us</span>
                    <h2>About {{ $data['about-us']->title }}</h2>
                    <p>{!! $data['about-us']->description !!}</p>
                </div>
                <div class="row in-stats small about-statistics">
                    <div class="col-lg-4 col-sm-4">
                        <div class="statistics">
                            <div class="statnumb counter-number">
                                <span class="counter">450</span>
                                <p>Happy Clients</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <div class="statistics">
                            <div class="statnumb">
                                <span class="counter">95</span><span>k</span>
                                <p>Hours Worked</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <div class="statistics mb0">
                            <div class="statnumb counter-number">
                                <span class="counter">850</span>
                                <p>Projects Done</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif