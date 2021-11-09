@extends('admin.include.layout')

@section('title', 'Industries We Work For::Edit')

@push('css')
    <link href="{{ asset('assets/dropify/dropify.css') }}" rel="stylesheet">
@endpush

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
                    'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'id' => 'form-validation']) !!}
                    @method('PUT')
                    @include($view_path.'.includes.form')
                    @include('admin.include.status')
                    @include('admin.include.submitButton')
                    <div class="hr hr-24"></div>

                    {!! Form::close() !!}



                </div><!-- /.col -->
            </div>
        </div>
    </div>
    @include('admin.include.dropify')
    @push('js')
        @include('admin.include.jquery_ckeditor')
        @include('admin.industries-we-work-for.includes.script')
    @endpush
@endsection
