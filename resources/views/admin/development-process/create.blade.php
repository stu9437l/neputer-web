@extends('admin.include.layout')

@section('title', 'Development Process ::Create')

@section('content')

    <div class="main-content">

        @include('admin.include.breadcrumb', [
           'base_route' => $base_route.'.index',
           'page' => 'Add'
       ])

        <div class="page-content">
            @include('admin.include.page-header', [
                'page' => 'Add',
                'title' => $panel,
            ])

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    @include('admin.include.display_flash_data')

                    {!! Form::open(['url' => route($base_route.'.store'), 'method' => 'post',
                    'class' => 'form-horizontal', 'role' => 'form', 'id' => 'our-skill-form',
                    'enctype' => 'multipart/form-data'
                    ]) !!}

                    @include($view_path.'.includes.form')
                    @include('admin.include.status')
                   @include('admin.include.submitButton')

                    <div class="hr hr-24"></div>

                    {!! Form::close() !!}


                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->

@endsection
@include('admin.include.dropify')
@section('js_scripts')
    @include('admin.include.jquery_ckeditor')
    @include('admin.our-skills.includes.scripts')
@endsection
