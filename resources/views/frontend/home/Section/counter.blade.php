@if(isset($_settings['icon1']))
<div class="statistics-section bg-gradient6 pad-tb tilt3d">
    <div class="container">
        <div class="row justify-content-center t-ctr">
            <div class="col-lg-4 col-sm-6">
                <div class="statistics">
                    <div data-tilt data-tilt-max="20" data-tilt-speed="1000" class="statistics-img">
                        <img src="@if(isset($_settings['icon1'])) {{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$_settings['icon1']) }}@endif" alt="years" class="img-fluid lazy" />
                    </div>
                    <div class="statnumb">
                        <span class="counter">{{ $_settings['counter_1'] ?? " Insert Counter 1 " }}</span><span>+</span>
                        <p>{{ $_settings['counter_title_1'] ?? "Insert Counter Title 1" }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="statistics">
                    <div data-tilt data-tilt-max="20" data-tilt-speed="1000" class="statistics-img">
                        <img src="@if(isset($_settings['icon2'])) {{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$_settings['icon2']) }}@endif" alt="years" class="img-fluid lazy" />
                    </div>
                    <div class="statnumb">
                        <span class="counter">{{ $_settings['counter_2'] ?? " Insert Counter 2 " }}</span><span>+</span>
                        <p>{{ $_settings['counter_title_2'] ?? "Insert Counter Title 2" }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row small t-ctr">
            <div class="col-lg-3 col-sm-6">
                <div class="statistics">
                    <div data-tilt data-tilt-max="20" data-tilt-speed="1000" class="statistics-img">
                        <img src="@if(isset($_settings['icon3'])) {{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$_settings['icon3']) }}@endif" alt="years" class="img-fluid lazy" />
                    </div>
                    <div class="statnumb">
                        <span class="counter">{{ $_settings['counter_3'] ?? " Insert Counter 3 " }}</span><span>+</span>
                        <p>{{ $_settings['counter_title_3'] ?? "Insert Counter Title 3" }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="statistics">
                    <div data-tilt data-tilt-max="20" data-tilt-speed="1000" class="statistics-img">
                        <img src="@if(isset($_settings['icon4'])) {{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$_settings['icon4']) }}@endif" alt="years" class="img-fluid lazy" />
                    </div>
                    <div class="statnumb counter-number">
                        <span class="counter">{{ $_settings['counter_4'] ?? " Insert Counter 4 " }}</span><span>k</span>
                        <p>{{ $_settings['counter_title_4'] ?? "Insert Counter Title 4" }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="statistics">
                    <div data-tilt data-tilt-max="20" data-tilt-speed="1000" class="statistics-img">
                        <img src="@if(isset($_settings['icon5'])) {{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$_settings['icon5']) }}@endif" alt="years" class="img-fluid lazy" />
                    </div>
                    <div class="statnumb">
                        <span class="counter">{{ $_settings['counter_5'] ?? " Insert Counter 5 " }}</span><span>k</span>

                        <p>{{ $_settings['counter_title_5'] ?? "Insert Counter Title 5" }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="statistics mb0">
                    <div data-tilt data-tilt-max="20" data-tilt-speed="1000" class="statistics-img">
                        <img src="@if(isset($_settings['icon6'])) {{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$_settings['icon6']) }}@endif" alt="years" class="img-fluid lazy" />
                    </div>
                    <div class="statnumb">
                        <span class="counter">{{ $_settings['counter_6'] ?? " Insert Counter 6 " }}</span><span>hrs</span>

                        <p>{{ $_settings['counter_title_6'] ?? "Insert Counter Title 6" }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif