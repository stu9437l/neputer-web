<div class="sidebar" id="sidebar">
    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'fixed')
        } catch (e) {
        }
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="icon-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="icon-pencil"></i>
            </button>

            <button class="btn btn-warning">
                <i class="icon-group"></i>
            </button>

            <button class="btn btn-danger">
                <i class="icon-cogs"></i>
            </button>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- #sidebar-shortcuts -->

    <ul class="nav nav-list">

        <li {!! request()->is('admin/dashboard')?'class=active':'' !!}>
            <a href="{{ route('admin.dashboard') }}">
                <i class="icon-dashboard"></i>
                <span class="menu-text"> Dashboard </span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed py-1" href="#blog" data-toggle="collapse" data-target="#blog">
                <i class="icon-paper-clip"></i>
                <span >Blog</span>
                <i class="icon-angle-down" style="float:right"></i>
            </a>
            <div class="{!! request()->is('admin/blogCategory*') || request()->is('admin/blog*')?'in':'collapse' !!}" id="blog" aria-expanded="false">
                <ul class="flex-column nav pl-4">
                    <li {!! request()->is('admin/blogCategory*')?'class=active':'' !!}>
                        <a href="{{ route('admin.blogCategory.index') }}">
                            <i class="icon-paper-clip"></i>
                            <span class="menu-text"> Blog Category </span>
                        </a>
                    </li>

                    <li {!! request()->is('admin/blog*')?'class=active':'' !!}>
                        <a href="{{ route('admin.blog.index') }}">
                            <i class="icon-bold"></i>
                            <span class="menu-text"> Blog </span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li {!! request()->is('admin/company-story*')?'class=active':'' !!}>
            <a href="{{ route('admin.company-story.index') }}">
                <i class="icon-compass"></i>
                <span class="menu-text"> Company Story </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed py-1" href="#portfolio" data-toggle="collapse" data-target="#portfolio">
                <i class="icon-shield"></i>
                <span >Portfolio</span>
                <i class="icon-angle-down" style="float:right"></i>
            </a>
            <div class="{!! request()->is('admin/portfolio*') || request()->is('admin/portfolio*')?'in':'collapse' !!}" id="portfolio" aria-expanded="false">
                <ul class="flex-column nav pl-4">
                    <li {!! request()->is('admin/portfolio-category*')?'class=active':'' !!}>
                        <a href="{{ route('admin.portfolio-category.index') }}">
                            <i class="icon-shield"></i>
                            <span class="menu-text"> Portfolio Category </span>
                        </a>
                    </li>

                    <li {!! request()->is('admin/portfolio*')?'class=active':'' !!}>
                        <a href="{{ route('admin.portfolio.index') }}">
                            <i class="icon-anchor"></i>
                            <span class="menu-text"> Portfolio </span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed py-1" href="#services" data-toggle="collapse" data-target="#services">
                <i class="icon-star-empty"></i>
                <span >Service</span>
                <i class="icon-angle-down" style="float:right"></i>
            </a>
            <div class="{!! request()->is('admin/services*') || request()->is('admin/child-service*')?'in':'collapse' !!}" id="services" aria-expanded="false">
                <ul class="flex-column nav pl-4">
                    <li {!! request()->is('admin/services*')?'class=active':'' !!}>
                        <a href="{{ route('admin.services.index') }}">
                            <i class="icon-star-empty"></i>
                            <span class="menu-text"> Service </span>
                        </a>
                    </li>

                    <li {!! request()->is('admin/child-service*')?'class=active':'' !!}>
                        <a href="{{ route('admin.child-service.index') }}">
                            <i class="icon-star-half"></i>
                            <span class="menu-text"> Child Service </span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed py-1" href="#pages" data-toggle="collapse" data-target="#pages">
                <i class="icon-book"></i>
                <span >Pages</span>
                <i class="icon-angle-down" style="float:right"></i>
            </a>
            <div class="{!! request()->is('admin/about_us*')
                         || request()->is('admin/contact*')
                         || request()->is('admin/sliders*')
                         || request()->is('admin/why-us*')
                         || request()->is('admin/our-work*')
                         || request()->is('admin/client*')
                         || request()->is('admin/development-process*')
                         || request()->is('admin/career*')
                         ?'in':'collapse' !!}" id="pages" aria-expanded="false">
                <ul class="flex-column nav pl-4">

                    <li {!! request()->is('admin/clients*')?'class=active':'' !!}>
                        <a href="{{ route('admin.clients.index') }}">
                            <i class="icon-crop"></i>
                            <span class="menu-text"> Client </span>
                        </a>
                    </li>

                    <li {!! request()->is('admin/about_us*')?'class=active':'' !!}>
                        <a href="{{ route('admin.about_us.index') }}">
                            <i class="icon-info-sign"></i>
                            <span class="menu-text"> About Us </span>
                        </a>
                    </li>

                    <li {!! request()->is('admin/contact*')?'class=active':'' !!}>
                        <a href="{{ route('admin.contact.index') }}">
                            <i class="icon-credit-card"></i>
                            <span class="menu-text"> Contact </span>
                        </a>
                    </li>
                    <li {!! request()->is('admin/career*')?'class=active':'' !!}>
                        <a href="{{ route('admin.career.index') }}">
                            <i class="icon-caret-left"></i>
                            <span class="menu-text"> Career </span>
                        </a>
                    </li>
                    <li {!! request()->is('admin/sliders*')?'class="active"':'' !!}>
                        <a href="{{route('admin.sliders.index')}}">
                            <i class="icon-picture"></i>
                            Sliders
                        </a>
                    </li>

                    <li {!! request()->is('admin/why-us*')?'class="active"':'' !!}>
                        <a href="{{route('admin.why-us.index')}}">
                            <i class="icon-question-sign"></i>
                            Why Us
                        </a>
                    </li>

                    <li {!! request()->is('admin/our-work*')?'class="active"':'' !!}>
                        <a href="{{route('admin.our-work.index')}}">
                            <i class="icon-laptop"></i>
                            Our Work
                        </a>
                    </li>
                    <li {!!request()->is('admin/development-process*')?'class="active"':'' !!}>
                        <a href="{{route('admin.development-process.index')}}">
                             Development Process
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li {!! request()->is('admin/our-skills*')?'class=active':'' !!}>
            <a href="{{ route('admin.our-skills.index') }}">
                <i class="icon-pencil"></i>
                <span class="menu-text"> Our Skills </span>
            </a>
        </li>

        <li {!! request()->is('admin/technologies*')?'class=active':'' !!}>
            <a href="{{ route('admin.technologies.index') }}">
                <i class="icon-wrench"></i>
                <span class="menu-text"> Our Technologies </span>
            </a>
        </li>
    <li {!! request()->is('admin/industries-we-work-for*')?'class=active':'' !!}>
            <a href="{{ route('admin.industries-we-work-for.index') }}">
                <i class="icon-home"></i>
                <span class="menu-text"> Industries we work for </span>
            </a>
        </li>

        <li {!! request()->is('admin/testimonial*')?'class=active':'' !!}>
            <a href="{{ route('admin.testimonial.index') }}">
                <i class="icon-code"></i>
                <span class="menu-text"> Testimonial </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed py-1" href="#pages" data-toggle="collapse" data-target="#enquiry">
                <i class="icon-medkit"></i>
                <span >Enquiry Message</span>
                <i class="icon-angle-down" style="float:right"></i>
            </a>
            <div class="{!! request()->is('admin/enquiry_career*')
                         || request()->is('admin/service_enquiry*'
                         || request()->is('admin/request_quote*'))
                          ?'in':'collapse' !!}" id="enquiry" aria-expanded="false">
                <ul class="flex-column nav pl-4">


                    <li {!! request()->is('admin/enquiry_career*')?'class="active"':'' !!}>
                        <a href="{{route('admin.enquiry_career.index')}}">
                            <i class="icon-picture"></i>
                           Career Enquiry
                        </a>
                    </li>

                    <li {!! request()->is('admin/service_enquiry*')?'class="active"':'' !!}>
                        <a href="{{route('admin.service_enquiry.index')}}">
                            <i class="icon-compass"></i>
                            Service Enquiry
                        </a>
                    </li>
                    <li {!! request()->is('admin/request_quote*')?'class="active"':'' !!}>
                        <a href="{{route('admin.request_quote.index')}}">
                            <i class="icon-refresh"></i>
                            Quotes Enquiry
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        {{--<li {!! request()->is('admin/category*')?'class="active open"':'' !!}>
            <a href="#" class="dropdown-toggle">
                <i class="icon-certificate"></i>
                <span class="menu-text"> Category </span>
                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li {!! request()->is('admin/category')?'class="active"':'' !!}>
                    <a href="{{ route('admin.category.index') }}">
                        <i class="icon-double-angle-right"></i>
                        List
                    </a>
                </li>

                <li {!! request()->is('admin/category/create')?'class="active"':'' !!}>
                    <a href="{{ route('admin.category.create') }}">
                        <i class="icon-double-angle-right"></i>
                        Add
                    </a>
                </li>

            </ul>
        </li>--}}



        <li {!! request()->is('admin/pages*')?'class="active"':'' !!}>
            <a href="{{ route('admin.pages.index') }}">
                <i class="icon-copy"></i>
                Page
            </a>
        </li>

        <li {!! request()->is('admin/users*')?'class="active"':'' !!}>
            <a href="{{ route('admin.users.index') }}">
                <i class="icon-user"></i>
                User
            </a>
        </li>


        <li {!! request()->is('admin/role*')?'class=active':'' !!}>
            <a href="{{ route('admin.roles.index') }}">
                <i class="icon-group"></i>
                <span class="menu-text"> Roles </span>
            </a>
        </li>

        <li {!! request()->is('admin/menu-sections')?'class=active':'' !!}>
            <a href="{{ route('admin.menu-sections.index') }}">
                <i class="icon-sitemap"></i>
                <span class="menu-text"> Menu Section </span>
            </a>
        </li>


        <li {!! request()->is('admin/tags*')?'class="active"':'' !!}>
            <a href="{{ route('admin.tags.index') }}">
                <i class="icon-tag"></i>
                Tags
            </a>
        </li>
        <li {!! request()->is('admin/our-team*')?'class="active"':'' !!}>
            <a href="{{ route('admin.our-team.index') }}">
                <i class="icon-user"></i>
               Our Team
            </a>
        </li>

        <li {!! request()->is('admin/site-configs/edit*')?'class=active':'' !!}>
            <a href="{{ route('admin.site-configs.edit') }}">
                <i class="icon-cog"></i>
                <span class="menu-text"> Setting </span>
            </a>
        </li>


    </ul><!-- /.nav-list -->

    <div class="sidebar-collapse" id="sidebar-collapse">
        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
    </div>

    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'collapsed')
        } catch (e) {
        }
    </script>
</div>