<!--Start Footer-->
<footer>
    <div class="footer-row1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="email-subs">
                        <h3>{{ $_settings['subscription_title'] ?? 'Enter Title for subscription' }}</h3>
                        {!! $_settings['subscription_subtitle'] ?? 'N/A' !!}
                    </div>
                </div>
                <div class="col-lg-6 v-center">
                    <div class="email-subs-form">
                        <form action="{{ route('subscribe.submit') }}" method="post" id="form-validation-subscribe">
                            @csrf
                            <input type="email" placeholder="Email Your Address" name="email" required>
                            <button type="submit" name="submit" class="lnk btn-main bg-btn">{{ $_settings['subscription_button_name'] ?? 'N/A' }} <i class="fas fa-chevron-right fa-icon"></i><span class="circle"></span></button>
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
                    <a class="navbar-brand mt30 mb25" href="#">
                        @isset($_settings['logo'])
                            @php $logo = \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$_settings['logo'] ?? 'N/A'); @endphp
                        @endisset
                        <img src="{{ $logo ?? 'n/a' }}" alt="Neputer Logo" width="100">
                    </a>
                    <p>{!! $_settings['footer_section_description'] !!}</p>
                    <a href="{!! $_settings['footer_button_link'] ?? '#' !!}" class="btn-main bg-btn3 lnk mt20">{!! $_settings['footer_button_text'] !!}
                        <i class="fas fa-chevron-right fa-icon"></i><span class="circle"></span></a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <h5>Contact Us</h5>
                    <ul class="footer-address-list ftr-details">
                        @if($_settings['company_email'])
                        <li>
                            <span><i class="fas fa-envelope"></i></span>
                            <p>Email <span> <a href="mailto:{{$_settings['company_email']}}">{{$_settings['company_email']}}</a></span></p>
                        </li>
                        @endif
                        @if($_settings['company_phone'])
                        <li>
                            <span><i class="fas fa-phone-alt"></i></span>
                            <p>Phone <span> <a href="tel:{{$_settings['company_phone']}}">{{$_settings['company_phone']}}</a></span></p>
                        </li>
                        @endif
                        @if($_settings['company_address'])
                        <li>
                            <span><i class="fas fa-map-marker-alt"></i></span>
                            <p>Address <span> {{$_settings['company_address']}}</span></p>
                        </li>
                        @endif
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-6">
                    @if(isset($_menus['footer-1']))
                    <h5>{{$_menus['footer-1']['title'] ?? 'N/A'}}</h5>
                    <ul class="footer-address-list link-hover">
                        @forelse($_menus['footer-1']['pages'] as $page)
                            @if($page->page_type == 'link')
                                <li><a href="/{{$page->link}}" @if($page->open_in =='new') target="_blank"@endif>{{$page->title}}</a></li>
                            @else
                                <li><a href="{{route('page.menu',$page->slug)}}" @if($page->open_in =='new') target="_blank"@endif>{{$page->title}}</a></li>
                            @endif
                        @empty
                        @endforelse
                    </ul>
                    @endif

                </div>
                <div class="col-lg-3 col-sm-6 footer-blog-">
                    @if(isset($_menus['footer-2']))
                        <h5>{{$_menus['footer-2']['title'] ?? 'N/A'}}</h5>
                        <ul class="footer-address-list link-hover">
                            @forelse($_menus['footer-2']['pages'] as $page)
                                @if($page->page_type == 'link')
                                   
                                    <li><a href="/{{$page->link}}" @if($page->open_in =='new') target="_blank"@endif>{{$page->title}}</a></li>
                                @else
                                    <li><a href="{{route('page.menu',$page->slug)}}" @if($page->open_in =='new') target="_blank"@endif>{{$page->title}}</a></li>
                                @endif
                            @empty
                            @endforelse
                        </ul>
                    @endif
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
{{--                            {!!  str_replace([ '%Year%', '%YEAR%', '%year%' ], '© ' .date('Y'), $_settings['copyright_message'] ?? 'Copyright Message here') !!}--}}
                            {!!  str_replace([ '%Year%', '%YEAR%', '%year%' ], '© ' .date('Y'), $_settings['copyright_message'] ?? 'Copyright Message here') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>
