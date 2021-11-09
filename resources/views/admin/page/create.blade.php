@extends('admin.include.layout')

@section('title', 'Page::Create')

@push('css')
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet" />
    <script src="{{asset('js/select2.min.js')}}"></script>
@endpush

@section('content')

    <div class="main-content">

        @include('admin.include.breadcrumb', [
            'base_route' => $base_route.'.index',
            /*'panel' => $panel, // panel value added directly through view composer - base controller*/
            'page' => 'Add'
        ])

        <div class="page-content">
            @include('admin.include.page-header', [
                'title' => 'Page',
                'page' => 'Add'
            ])

            @if($errors->any())
                @include('admin.include.form_alert_message')
            @endif

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    {!! Form::open(['url'=>route($base_route.'.store'), 'method'=>'post',
                    'enctype' => 'multipart/form-data',
                    'class' => 'form-horizontal', 'id' => 'page-form']) !!}

                    @include($view_path.'.include.form')

                    @include('admin.include.submitButton')
                    {!! Form::close() !!}
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->

@endsection

@section('js_scripts')
    @include('admin.page.include.scripts')
    <script>
        $(function () {
            var showContent = '{{ $errors->first('content') }}';
            if(!showContent){
                $('#page_link').show();
            }

            $('#menuList').select2({
                minimumInputLength : 2,
                ajax: {
                    url : '{{route('admin.pages.menulist')}}',
                    processResults: function (data) {
                        return {
                            results : data.body,
                        };
                    },
                }});
        });
    </script>
@endsection



