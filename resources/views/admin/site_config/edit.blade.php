@extends('admin.include.layout')

@section('title', 'Site Config::Edit')

@section('content')

    <div class="main-content">
        @include('admin.include.breadcrumb', [
            'base_route' => $base_route.'.edit',
            'page' => 'Edit'
        ])

        <div class="page-content">

{{--            @include('admin.include.page-header', [--}}
{{--            'page' => 'Edit',--}}
{{--            'title' => 'Site Configuration'--}}
{{--        ])--}}


            @include('admin.include.display_flash_data')

            @if($errors->any())
                @include('admin.include.form_alert_message')
            @endif

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    {!! Form::open(['url'=>route($base_route.'.update'), 'method'=>'put', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) !!}
                    <div class="tabbable">
                        <ul class="nav nav-tabs" id="top-tab">
                            <li class="active">
                                <a data-toggle="tab" href="#home" aria-expanded="false" class="top-tab-button">
                                    <i class="green ace-icon fa fa-home bigger-120"></i>
                                    Home
                                </a>
                            </li>

                            <li>
                                <a data-toggle="tab" href="#contact" aria-expanded="true" class="top-tab-button">
                                    Page Settings
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#title_and_subtitle" aria-expanded="true" class="top-tab-button">
                                    Title And Subtitle
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#seo" aria-expanded="true" class="top-tab-button">
                                    SEO
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#others" aria-expanded="true" class="top-tab-button">
                                    Others
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#footer" aria-expanded="true" class="top-tab-button">
                                    Footer
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="home" class="tab-pane  fade active in">
                                @include('admin.site_config.include.general_form')
                            </div>
                            <div id="contact" class="tab-pane">
                                @include('admin.site_config.include.page_settings')
                            </div>
                            <div id="seo" class="tab-pane">
                                @include('admin.site_config.include.seo')
                            </div>
                            <div id="others" class="tab-pane">
                                @include('admin.site_config.include.other')
                            </div>
                            <div id="title_and_subtitle" class="tab-pane">
                                @include('admin.site_config.include.title-and-subtitle')
                            </div>
                             <div id="footer" class="tab-pane">
                                 @include('admin.site_config.include.footer')
                             </div>
                        </div>
                    </div>


                    <div class="clearfix form-actions">

                        {!! Form::hidden('tab', '#home' , ['id' => 'tab_value'] ) !!}

                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit">
                                <i class="icon-ok bigger-110"></i>
                                Update
                            </button>

                            <button class="btn" type="reset">
                                <i class="icon-undo bigger-110"></i>
                                Reset
                            </button>

                            <a class="btn btn-danger" href="{{ route('cache.clear') }}" title="Purge application cache" type="button">
                                <i class="fa-times bigger-110"></i>
                                Purge Cache
                            </a>

                        </div>
                    </div>

                    {!! Form::close() !!}
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
        <!-- /.page-content -->
    </div><!-- /.main-content -->

@endsection
@include('admin.include.dropify')
@section('js_scripts')
    <script>
        /* Show the tab from where you have post*/
        $('.top-tab-button').on('click', function (){
            $('#tab_value').val($(this).attr('href'));
        })
        $('#top-tab a[href="{{ old('tab') }}"]').tab('show');

    </script>
    @include('admin.include.jquery_ckeditor')
@endsection



