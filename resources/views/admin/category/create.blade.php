@extends('admin.include.layout')

@section('content')

    <div class="main-content">

        @include('admin.include.breadcrumb', [
           'base_route' => $base_route.'.index',
           'page' => 'Add'
       ])

        <div class="page-content">
            @include('admin.include.page-header', [
                'page' => 'Add',
                'title' => '',
            ])

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    {{--@if ($errors->any())
                        @include('admin.include.form_validation_message')
                    @endif--}}

                    {!! Form::open(['url' => route($base_route.'.store'), 'method' => 'post',
                    'class' => 'form-horizontal', 'role' => 'form', 'id' => 'cat-form',
                    'enctype' => 'multipart/form-data'
                    ]) !!}

                    @include($view_path.'.includes.form')
                    @include('admin.include.submitButton')

                    <div class="hr hr-24"></div>

                    {!! Form::close() !!}


                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->

@endsection

@section('js_scripts')
    @include('admin.include.jquery_ckeditor')
    @include('admin.category.includes.scripts')
@endsection
