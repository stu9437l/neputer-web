
<div class="onloadpage" id="page_loader">
    <div class="pre-content">
        <div class="logo-pre"><img style="max-height: 60px;" src="@if(isset($_settings['logo'])){{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$_settings['logo']) }} @endif" alt="Logo" class="img-fluid" /></div>
        <div class="pre-text-"><span>{!! $_settings['footer_section_description'] ?? 'Neputer Description' !!}</span></div>
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
                    @if(isset($_menus['top-bar-menu']))
                            @forelse($_menus['top-bar-menu']['pages'] as $page)
                                @if($page->page_type == 'link')
                                    <li><a href="{{url($page->link)}}"  class="menu-links" @if($page->open_in =='new') target="_blank"@endif>{{$page->title}}</a></li>
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

            </ul>
        </nav>
    </div>
</header>

