@extends('admin.include.layout')

@section('title', 'Why Us::Edit')

@section('content')

    <div class="main-content">

        @include('admin.include.breadcrumb', [
           'base_route' => $base_route.'.index',
           'page' => 'Edit'
       ])

        <div class="page-content">

            @include('admin.include.page-header', [
                'page' => 'Edit',
                'title' => $panel,
                'id' => $data['row']->id
            ])

            <div class="row">
                <div class="col-xs-12">

                    <!-- PAGE CONTENT BEGINS -->

                    @include('admin.include.display_flash_data')

                    {!! Form::model($data['row'], ['url' => route($base_route.'.update', $data['row']->id), 'method' => 'POST',
                    'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data', 'id' => 'our-teams-form']) !!}
                    @method('PUT')
                    @include($view_path.'.include.form')

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
