<!--Start Footer-->
<footer>
    <div class="footer-row1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="email-subs">
                        <h3>{{ $_settings['subscription_title'] ?? 'Enter Title for subscription' }}</h3>
                        {!! $_settings['subscription_subtitle'] !!}
                    </div>
                </div>
                <div class="col-lg-6 v-center">
                    <div class="email-subs-form">
                        <form action="{{route('subscribe.submit')}}" method="post" id="form-validation-subscribe">
                            @csrf
                            <input type="email" placeholder="Email Your Address" name="email" required>
                            <button type="submit" name="submit" class="lnk btn-main bg-btn">{{ $_settings['subscription_button_name'] }} <i class="fas fa-chevron-right fa-icon"></i><span class="circle"></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-row2">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-3 col-sm-6  ftr-brand-pp">
                    <a class="navbar-brand mb30 mt30" href="#">
                        <img src="@if(isset($_settings['neputer_logo'])){{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$_settings['neputer_logo']) }} @endif" alt="Neputer Logo" width="100">
                    </a>
                 {!!  $_settings['footer_1'] ?? 'Footer 1' !!}
                </div>
                <div class="col-lg-3 col-sm-6">
                    {!!  $_settings['footer_2'] ?? 'Footer 2' !!}
                </div>
                <div class="col-lg-3 col-sm-6">
                    {!!  $_settings['footer_3'] ?? 'Footer 3' !!}

                </div>
                <div class="col-lg-3 col-sm-6 footer-blog-">
                    {!!  $_settings['footer_4'] ?? 'Footer 4' !!}
                </div>
            </div>
        </div>
    </div>
    <div class="footer-row3">
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-">
                            {!!  $_settings['copyright_message'] ?? 'Copyright Message here' !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
