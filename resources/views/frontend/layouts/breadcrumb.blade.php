
    <section class="breadcrumb-area"
{{--             @if(isset($banner))data-background="{{ \App\Facades\ViewHelperFacade::getImagePath('page', $banner) }}" @endif>--}}
             @if(isset($banner))data-background="{{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration', $banner) }}" @endif>
    <div class="text-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 v-center">
                    <div class="bread-inner">
                        <div class="bread-menu">
                            <ul>
                                @if(isset($page))<li><a href="/">Home</a></li>
                                <li><span style="font-size: 30px">.</span></li>
                                <li><a href="#"> {{ $page }} </a></li>
                                @endif
                            </ul>
                        </div>
                        <div class="bread-title">
                            <h2>{{ $title }}</h2>
                            @if(isset($description))
                                <br>
                                 {!! $description !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
