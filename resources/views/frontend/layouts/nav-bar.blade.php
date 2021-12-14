
<div class="onloadpage" id="page_loader">
    <div class="pre-content">
        <div class="logo-pre"><img src="@if(isset($_settings['logo'])){{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$_settings['logo']) }} @endif" alt="Logo" class="img-fluid" /></div>
        <div class="pre-text-"><span>{{ $_settings['neputer_description'] ?? 'Insert Neputer Description' }}</span></div>
    </div>
</div>
<!--End Preloader -->
<!--Start Header -->
<header class="nav-bg-w main-header navfix fixed-top menu-white header-pr">
    <div class="container-fluid m-pad">
        <div class="menu-header">
            <div class="dsk-logo"><a class="nav-brand" href="/">

                    <img src="@if(isset($_settings['logo'])){{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$_settings['logo']) }} @endif" alt="Logo" class="mega-logo">
                </a></div>
            <div class="custom-nav" role="navigation">
                <ul class="nav-list">
                    <li ><a href="{{ route('user.home') }}" class="menu-links">Home</a></li>
                    @if(isset($_menus['footer-1']))
                            @forelse($_menus['footer-1']['pages'] as $page)
                                @if($page->page_type == 'link')
                                    <li><a href="{{$page->link}}"  class="menu-links" @if($page->open_in =='new') target="_blank"@endif>{{$page->title}}</a></li>
                                @else
                                    <li><a href="{{route('page.menu',$page->slug)}}"  class="menu-links" @if($page->open_in =='new') target="_blank"@endif>{{$page->title}}</a></li>
                                @endif
                            @empty
                            @endforelse
                    @endif

                    <li>
                        <a href="{{ route('request-a-quote') }}" class="btn-br bg-btn3 btshad-b2 lnk">Request A Quote <span class="circle"></span></a>
                    </li>
                </ul>
            </div>
            <div class="mobile-menu2">
                <ul class="mob-nav2">
                    <li class="navm-"> <a class="toggle hc-nav-trigger hc-nav-1" href="#" role="button" aria-controls="hc-nav-1"><span></span></a></li>
                </ul>
            </div>
        </div>
        <!--Mobile Menu-->
        <nav id="main-nav" class="hc-nav-original hc-nav-1">
            <ul class="first-nav">
                <li><a href="{{ route('user.home') }}" class="menu-links">Home</a></li>
<!--                <li><a href="#">Home</a>
                    <ul>
                        <li>
                            <a href="#">Homepage Demos</a>
                            <ul>
                                <li><a href="digital-agency.html">Digital Agency</a></li>
                                <li><a href="digital-agency-dark.html">Digital Agency Dark</a></li>
                                <li><a href="web-design-agency.html">Web Design Agency</a></li>
                                <li><a href="web-design-agency-dark.html">Web Design Agency Dark</a></li>
                                <li><a href="digital-marketing.html">Digital Marketing</a></li>
                                <li><a href="digital-marketing-dark.html">Digital Marketing Dark</a></li>
                                <li><a href="lead-generation.html">Lead Generation Agency</a></li>
                                <li><a href="lead-generation-dark.html">Lead Generation Agency Dark</a></li>
                                <li><a href="freelance-portfolio.html">Freelance Portfolio</a></li>
                                <li><a href="freelance-portfolio-dark.html">Freelance Portfolio Dark</a></li>
                                <li><a href="minimal-portfolio.html">Minimal Portfolio</a></li>
                                <li><a href="creative-agency.html">Creative Agency</a></li>
                                <li><a href="branding-agency.html">Branding  Agency</a></li>
                                <li><a href="app-development.html">App Development Agency</a></li>
                                <li><a href="modern-agency.html">Modern Agency</a></li>
                                <li><a href="business-and-startup.html">Business &amp; Startup</a></li>
                                <li><a href="graphic-studio.html">Graphic Studio</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">One-Page Demos</a>
                            <ul>
                                <li><a href="graphic-studio-onepage.html">Graphic Studio</a></li>
                                <li><a href="branding-agency-onepage.html">Branding  Agency</a></li>
                                <li><a href="modern-agency-onepage.html">Modern Agency</a></li>
                                <li><a href="business-and-startup-onepage.html">Business &amp; Startups</a></li>
                                <li><a href="creative-agency-onepage.html">Creative Agency</a></li>
                                <li><a href="minimal-portfolio-onepage.html">Minimal Portfolio</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="#">Blog</a>
                    <ul>
                        <li><a href="blog-grid-1.html">Blog Grid 1</a> </li>
                        <li><a href="blog-grid-2.html">Blog Grid 2</a> </li>
                        <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a> </li>
                        <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a> </li>
                        <li><a href="blog-single.html">Blog Single</a></li>
                    </ul>
                </li>-->
            </ul>
        </nav>
    </div>
</header>
<!--<div class="popup-modal1">
    <div class="modal" id="menu-popup">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="common-heading">
                        <h4 class="mt0 mb0">Write a Message</h4>
                    </div>
                    <button type="button" class="closes" data-dismiss="modal">&times;</button></div>
                &lt;!&ndash; Modal body &ndash;&gt;
                <div class="modal-body">
                    <div class="form-block fdgn2 mt10 mb10">
                        <form action="#" method="post" name="feedback-form">
                            <div class="fieldsets row">
                                <div class="col-md-12"><input type="text" placeholder="Full Name" name="name"></div>
                                <div class="col-md-12"><input type="email" placeholder="Email Address" name="email"></div>
                                <div class="col-md-12"><input type="number" placeholder="Contact Number" name="phone"></div>
                                <div class="col-md-12"><input type="text" placeholder="Subject" name="subject"></div>
                                <div class="col-md-12"><textarea placeholder="Message" name="message"></textarea></div>
                            </div>
                            <div class="fieldsets mt20 pb20">
                                <button type="submit" name="submit" class="lnk btn-main bg-btn" data-dismiss="modal">Submit <i class="fas fa-chevron-right fa-icon"></i><span class="circle"></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->
<!--Mobile contact-->

<!--End Header -->
